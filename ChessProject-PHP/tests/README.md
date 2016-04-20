# Develop Log base on git commit

_1._ Initial commit

_2._ Implement `isLegalBoardPosition()` function in ChessBoard

_3._ Implement `add()` function, Pass all `ChessBoardTest.php` test

_4._ Implement `move()` function in Pawn Class

_5._ Correct two typing Error in `PawnTest.php`
> This is the `ChessProject-Java PawnTest.java` :
``` java
@Before
    public void setUp() {
        this.chessBoard = new ChessBoard();
        this.testSubject = new Pawn(PieceColor.BLACK);
    }
@Test
    public void testChessBoard_Add_Sets_YCoordinate() {
        this.chessBoard.Add(testSubject, 6, 3, PieceColor.BLACK);
        assertEquals(3, testSubject.getYCoordinate());
    }
```

_6._ Also Correct a type Error in `ChessBoardTest.php`
> This is the code in `ChessProject-Java ChessBoardTest.java` :
``` java
   @Test
       public void testLimits_The_Number_Of_Pawns()
               int row = i / ChessBoard.MAX_BOARD_WIDTH;
```

##### After this commit all unit tests found under the Tests folder has been past. A Tag v0.1 is created.You can switch to a new branch ‘b1’ and roll back the code using `git checkout -b b1 v0.1`

_7._ Refactor **Pawn class**: add a general class Piece of which Pawn is a subclass, and pass all existing tests.

_8._ Write `PieceTest.php`. To test it, extend Piece with another subclass Rook. All tests in `PieceTest.php` are passed.

_9._ Update the ChessBoard size to 8X8, which is standard and matches to the illustration figure in the readme document. All Tests are passed.

_10._ Refactor the project with **Game class** _which handles the application logic of playing the chess game: that is, set up a chessboard, make move, whose turn to play, and assess the state of the game: in play, checkmate, or stalemate._ Write `GameTest.php`.

_11._ Refactor **ChessBoard class** to only handle the operations on the board; _that is, initialise a board with the given size, add/remove/move a piece. To make the chessboard more general, it should not include any game rule. All the game rule will be on the concrete Piece subclasses such as Pawn or Rook._ In ChessBoard pass $_piece into Array $_pieces, change `getName()` function in Pawn, Rook

_12._ Allow PHPUnit to run all files end with `Test.php`

_13._ Add Function `makeMove()` in Game and some `testValidMove` tests in GameTest

_14._ Refactor `$_pieces` in ChessBoard, default value set to be `'null'`, then set
```
$_pieces[$_xCoordinate][$_yCoordinate] = $piece
```
some related change in Pawn, Rook and Piece

_15._ Clean Code

_16._ Add **Log class**, and use Log `add()` and `display()` function in Game.php

_17._ Generate `PHPDoc` for test case
