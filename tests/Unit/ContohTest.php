<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ContohTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_cek_tambah(): void
    {   
        $A = 5;
        $B = 10;

        $this->assertEquals(15, $A + $B);

        $arr = [null, null];

        $this->assertContainsOnlyNull($arr);
        $this->assertContainsNotOnlyString(['abc', 'aw', '2']);
    }
}
