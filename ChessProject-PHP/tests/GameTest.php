<?php

namespace LogicNow\Test;


use LogicNow\Game;
use LogicNow\Pawn;
use LogicNow\Rook;
use LogicNow\PieceColorEnum;

class GameTest extends \PHPUnit_Framework_TestCase
{

    /** @var  Game */
    private $_testSubject;

    public function setUp()
    {
        $this->_testSubject = new Game();
    }

    public function testValidMove()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $test = $this->_testSubject->validateMove($firstPawn, 6, 2);
        $this->assertTrue($test);
        $this->assertEquals(6, $firstPawn->getXCoordinate());
        $this->assertEquals(2, $firstPawn->getYCoordinate());
    }

    public function testValidMove_Not_Same_Cell()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $test = $this->_testSubject->validateMove($firstPawn, 6, 3);
        $this->assertFalse($test);
    }

    public function testValidMove_Piece_Move_IllegalCoordinates_Left_DoesNotMove()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $test = $this->_testSubject->validateMove($firstPawn, 4, 3);
        $this->assertFalse($test);
    }

    public function testValidMove_Piece_Move_OccupiedBySameColor()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $firstRook = new Rook(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $this->_testSubject->getBoard()->add($firstRook, 6, 2);
        $test = $this->_testSubject->validateMove($firstPawn, 6, 2);
        $this->assertFalse($test);
    }

    public function testMakeMove_Piece_Move_OccupiedByDifferentColor()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $firstRook = new Rook(PieceColorEnum::WHITE());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $this->_testSubject->getBoard()->add($firstRook, 6, 2);
        $this->_testSubject->makeMove($firstPawn, 6, 2);
        $this->assertEquals(2, $firstPawn->getYCoordinate());
    }

}