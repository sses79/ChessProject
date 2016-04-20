<?php

namespace LogicNow\Test;

use LogicNow\ChessBoard;
use LogicNow\MovementTypeEnum;
use LogicNow\Pawn;
use LogicNow\Rook;
use LogicNow\PieceColorEnum;


class PieceTest extends \PHPUnit_Framework_TestCase
{

    /** @var  ChessBoard */
    private $_chessBoard;
    /** @var  Pawn */
    private $_testSubject;

    protected function setUp()
    {
        $this->_chessBoard = new ChessBoard();
        $this->_testSubject = new Rook(PieceColorEnum::BLACK());

    }

    public function testChessBoard_Add_Sets_XCoordinate_YCoordinate()
    {
        $this->_chessBoard->add($this->_testSubject, 7, 0, PieceColorEnum::BLACK());
        $this->assertEquals(7, $this->_testSubject->getXCoordinate());
        $this->assertEquals(0, $this->_testSubject->getYCoordinate());
    }

    public function testRook_Get_Name()
    {
        $this->assertEquals('R', $this->_testSubject->getName());
    }


}