<?php

use Chess\King;
use Chess\Pawn;
use Chess\Bishop;
use Chess\ChessPiece;
use Chess\Knight;
use Chess\Rook;
use Chess\Queen;

require 'vendor/autoload.php';

// TEST IS IN CHESS BOARD
// $testIsIn = new Pawn(7,4,2);
// dump($testIsIn->isInChessBoard(8,8));

// TEST KING MOVEMENTS
$testKing = new King(5,5,1);
dump($testKing->canGoTo(4,4));



// FILL THE CHESSBOARD
$chessBoard = [];
for($i = 1; $i < 9; $i++){
    // $i < 3 = black pieces
    // $i > 6 = white pieces
    $color = ($i < 3) ? 2 : (($i > 6) ? 1 : 0);

    // Fill the row with random pieces
    for($j = 1; $j < 9; $j++){
        if($color){
            $random = rand(1, 6);
            switch($random){
                case 1:
                    $chessBoard[] = new Bishop($i, $j, $color);
                    break;
                case 2:
                    $chessBoard[] = new Knight($i, $j, $color);
                    break;
                case 3:
                    $chessBoard[] = new King($i, $j, $color);
                    break;
                case 4:
                    $chessBoard[] = new Pawn($i, $j, $color);
                    break;
                case 5:
                    $chessBoard[] = new Rook($i, $j, $color);
                    break;
                case 6:
                    $chessBoard[] = new Queen($i, $j, $color);
                    break;
            }
        }
    }
}

// TEST CAN GO TO (X, Y)
foreach($chessBoard as $piece){
    if ($piece->canGoTo(5, 5)) {
        echo "La pièce en position " . $piece->getX() . ":" . $piece->getY() . " peut se déplacer à (5, 5) <br>";
    } else {
        echo "La pièce en position " . $piece->getX() . ":" . $piece->getY() . " ne peut pas se déplacer à (5, 5) <br>";
    }
}

// DUMP
dump($chessBoard);


// TEST CAN EAT
$testEatA = new Knight(3, 3, 1);
$testEatB = new Knight(5, 4, 2);

echo "<br/>Test canEat : ";
if($testEatA->canEat($testEatB)) echo "OUI";
else echo "NON";
echo "<br/> Test canEat : ";

$testEatB = new Knight(4, 4, 2);
if($testEatA->canEat($testEatB)) echo "OUI";
else echo "NON";
echo "<br>";
echo $testEatA;

$pawnEatA = new Pawn(3,3,ChessPiece::BLACK);
echo $pawnEatA;
$pawnEatB = new Pawn(4,2,ChessPiece::WHITE);
echo $pawnEatB;

if($pawnEatA->canEat($pawnEatB)) echo "<br>Oui</>";
else echo "<br>NON<br>";


if($pawnEatB->canEat($pawnEatA)) echo "<br>Oui</>";
else echo "<br>NON<br>";