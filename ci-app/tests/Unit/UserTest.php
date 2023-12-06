<?php

namespace tests\Unit;

use App\Controllers\UserTestController;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function testClassConstructor(): void
    {
        $user = new UserTestController(21, 'John',"");
        $user->addFavoriteMovie('RRR');
        $this->assertSame('John', $user->name);
        $this->assertSame(21, $user->age);
        $this->assertArrayHasKey('0', $user->favorite_movies);
    }

}
