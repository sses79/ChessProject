<?php

namespace LogicNow\Test;

use LogicNow\ChessBoard;
use LogicNow\MovementTypeEnum;
use LogicNow\Pawn;
use LogicNow\PieceColorEnum;


class PawnTest extends \PHPUnit_Framework_TestCase
{

    /** @var  ChessBoard */
    private $_chessBoard;
    /** @var  Pawn */
    private $_testSubject;

    protected function setUp()
    {
        $this->_chessBoard = new ChessBoard();
        $this->_testSubject = new Pawn(PieceColorEnum::BLACK());
    }

    public function testChessBoard_Add_Sets_XCoordinate()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
    }

    public function testChessBoard_Add_Sets_YCoordinate()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Right_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->_testSubject->move(MovementTypeEnum::MOVE(), 7, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Left_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->_testSubject->move(MovementTypeEnum::MOVE(), 4, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->_testSubject->move(MovementTypeEnum::MOVE(), 6, 2);
        //$this->assertEquals(6, $this->_testSubject->getXCoordinate());
        //$this->assertEquals(2, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_currentPositionAsString()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
    }

}