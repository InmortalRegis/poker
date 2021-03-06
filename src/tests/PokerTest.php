<?php

namespace InmortalRegis\TestProject\Tests;

use InmortalRegis\TestProject\Models\Poker;
use PHPUnit\Framework\TestCase;

final class PokerTest extends TestCase
{
    public function testAlgorithm()
    {
        $results1 = Poker::isStraight([2, 3, 4, 5, 6]);
        $this->assertEquals($results1, true, "2, 3, 4 ,5, 6");
        $results2 = Poker::isStraight([14, 5, 4, 2, 3]);
        $this->assertEquals($results2, true, "14, 5, 4 ,2, 3");
        $results3 = Poker::isStraight([7, 7, 12, 11, 3, 4, 14]);
        $this->assertEquals($results3, false, "7, 7, 12 ,11, 3, 4, 14");
        $results4 = Poker::isStraight([7, 3, 2]);
        $this->assertEquals($results4, false, "7, 3, 2");
    }
}
