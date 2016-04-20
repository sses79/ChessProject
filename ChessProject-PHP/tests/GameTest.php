<?php

namespace LogicNow\Test;


use LogicNow\Game;
use LogicNow\Pawn;
use LogicNow\PieceColorEnum;

class GameTest extends \PHPUnit_Framework_TestCase
{

    /** @var  Game */
    private $_testSubject;

    public function setUp()
    {
        $this->_testSubject = new Game();
    }

    public function testValid_Move()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $test = $this->_testSubject->validateMove($firstPawn,5,5);
        $this->assertTrue($test);
    }

}