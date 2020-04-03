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


}
