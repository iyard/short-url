<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Url
 * @package App
 *
 * @property integer $id
 * @property string $url
 * @property string $token
 * @property integer $count_visits
 */
class Url extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'urls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'token'
    ];

    /**
     * Return unique token
     *
     * @return string
     */
    public static function getToken()
    {
        $token = Token::get();
        return self::isTokenUnique($token) ? $token : self::getToken();
    }

    /**
     * Check token is absent in urls table
     *
     * @param $token
     * @return bool
     */
    private static function isTokenUnique($token)
    {
        return Url::where('token', $token)
            ->count() === 0;
    }

    /**
     * Check is model already saved in database
     *
     * @param string $url
     * @return bool
     */
    private static function isModelCreated(string $url)
    {
        return Url::where('url', $url)
                ->count() > 0;
    }

    public static function findModelByToken($token)
    {
        return Url::where('token', $token)
            ->first();
    }

    /**
     * Find model by url or create new
     *
     * @param string $url
     * @return Url
     */
    public static function findOrCreateByUrl(string $url)
    {
        return self::isModelCreated($url) ? self::where('url', $url)->first() : new self(['url' => $url]);
    }

    /**
     * Boot the model
     *
     * @return  void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($url) {
            $url->token = self::getToken();
        });
    }

    /**
     * Return short url
     *
     * @param string $baseUrl
     * @return string
     */
    public function getShortUrl(string $baseUrl)
    {
        return $baseUrl . DIRECTORY_SEPARATOR . $this->token;
    }

    /**
     * Add visit
     */
    public function addVisit()
    {
        $this->count_visits++;
        $this->save();
    }
}
