<?php

namespace Tests\Unit;

use App\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    private $urls;

    public function setUp(): void
    {
        parent::setUp();

        $this->urls = factory(Url::class, 3)->create();
    }

    public function testGetToken()
    {
        $token = Url::getToken();
        $this->assertDatabaseMissing('urls', ['token' => $token]);
    }

    public function testFindModelByToken()
    {
        $url = Url::all()->first();
        $findedUrl = Url::findModelByToken($url->token);
        $this->assertEquals($url->token, $findedUrl->token);
    }

    public function testFindOrCreateByUrl()
    {
        $fakeUrl = $this->faker->url;
        $url = Url::findOrCreateByUrl($fakeUrl);
        $url->save();
        $this->assertDatabaseHas('urls', ['url' => $fakeUrl]);
    }

    public function testCreate()
    {
        $response = $this->get(route('create'));

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $fakeUrl = $this->faker->url;
        $response = $this->post(route('store', ['url' => $fakeUrl]));

        $this->assertDatabaseHas('urls', ['url' => $fakeUrl]);
        $response->assertStatus(200);
    }
}
