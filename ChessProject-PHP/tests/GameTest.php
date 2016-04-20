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

    /**
     * test validateMove()
     * Also checkBoardBoundary()
     */
    public function testValidMove()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $test = $this->_testSubject->validateMove($firstPawn, 8, 2);
        $this->assertFalse($test);
    }

    /**
     * test validateMove()
     * Also checkNotSameCell()
     */
    public function testValidMove_Not_Same_Cell()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $test = $this->_testSubject->validateMove($firstPawn, 6, 3);
        $this->assertFalse($test);
    }

    /**
     * test validateMove()
     * Also Class Piece move()
     */
    public function testValidMove_Piece_Move_IllegalCoordinates_Left_DoesNotMove()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $test = $this->_testSubject->validateMove($firstPawn, 4, 3);
        $this->assertFalse($test);
    }

    /**
     * test validateMove()
     * Also checkOccupiedBySameColor()
     */
    public function testValidMove_Piece_Move_OccupiedBySameColor()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $firstRook = new Rook(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 6, 3);
        $this->_testSubject->getBoard()->add($firstRook, 6, 2);
        $test = $this->_testSubject->validateMove($firstPawn, 6, 2);
        $this->assertFalse($test);
    }

    /**
     * test makeMove()
     * Also test move()
     * And Class Log add() display()
     */
    public function testMakeMove_Piece_Move_LegalCoordinates_Forward_DoesMove()
    {
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $this->_testSubject->getBoard()->add($firstPawn, 5, 3);
        $this->_testSubject->makeMove($firstPawn, 5, 2);
        $this->assertEquals(2, $firstPawn->getYCoordinate());
    }

    /**
     * test makeMove()
     * Also test capture()
     * And Class Log add() display()
     */
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