<?php

namespace Tests\Unit;

use App\Token;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $token = Token::get();
        $this->assertEquals(Token::DEFAULT_LENGTH, strlen($token));

        $token = Token::get(3);
        $this->assertEquals(3, strlen($token));
    }
}
