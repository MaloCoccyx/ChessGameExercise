<?php

namespace Chess;

class Pawn extends ChessPiece {

    private int $move = 0;

    /**
     * canGoTo
     *
     * @param  mixed $x
     * @param  mixed $y
     * @return bool
     */
    public function canGoTo(int $x, int $y, int $eat = null, int $two = null): bool
    {
        // Check if piece is in chess board and if new coord is !== than actual
        if (!parent::isInChessBoard($x, $y) || parent::isOnSameCoord($x, $y)) return false;

        $dx = abs($x - $this->getX());
        $dy = abs($y - $this->getY());

        // Check if Pawn is actually eaten
        if ($eat !== null) {

            if ($dx == $dy) {
                $this->move = 1;
                return true;
            }
            return false;
        }

        // Check if Pawn already move once time && if he want to move by 2
        if ($two !== null) {
            $moveDirection = ($this->getColor() == parent::WHITE) ? 2 : -2;

            if ($dy == $moveDirection && $dx == 0) {
                $this->move = 1;
                return true;
            }
            return false;
        }

        // Check if Pawn can move
        // Set moveDirection by color for Pawn
        $moveDirection = ($this->getColor() == parent::WHITE) ? 1 : -1;
        if ($dy == $moveDirection && $dx == 0) {
            $this->move = 1;
            return true;
        }

        return false;
    }

    /**
     * canEat
     *
     * @param  mixed $piece
     * @return bool
     */
    public function canEat(ChessPiece $piece): bool
    {
        // Check if Pawn color !== $piece color
        if($this->getColor() == $piece->getColor()) return false;

        // Get piece coord
        $pieceX = $piece->getX();
        $pieceY = $piece->getY();

        // Pawn eat direction on axy Y by color
        $eatDirection = ($this->getColor() == parent::BLACK) ? -1 : 1;

        // Check piece color
        if($this->getY() + $eatDirection == $pieceY && abs($this->getX() - $pieceX) == 1){
            return $this->canGoTo($pieceX, $pieceY, 1);
        }
        return false;
    }
}