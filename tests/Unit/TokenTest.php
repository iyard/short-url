<?php

namespace Tests\Unit;

use App\Token;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    /**
     * Test get method.
     *
     * @return void
     */
    public function testGet()
    {
        $token = Token::get();
        $this->assertEquals(Token::DEFAULT_LENGTH, strlen($token));

        $token = Token::get(3);
        $this->assertEquals(3, strlen($token));
    }
}
