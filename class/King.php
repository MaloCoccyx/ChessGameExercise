<?php

namespace Chess;

class King extends ChessPiece {

    /**
     * canGoTo
     *
     * @param  mixed $x
     * @param  mixed $y
     * @return bool
     */
    public function canGoTo(int $x, int $y): bool
    {
        // Check if piece is in chess board and if new coord is !== than actual
        if (!parent::isInChessBoard($x, $y) || parent::isOnSameCoord($x, $y)) return false;

        $dx = abs($x - $this->getX());
        $dy = abs($y - $this->getY());

        // Check if King is moving Vertically, Horizontally or Diagonally
        if(($dx == 0 && $dy == 1) || ($dy == 0 && $dx == 1) || ($dx == 1 && $dy == 1)) return true;
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
        if($this->getColor() == $piece->getColor()) return false;
        return $this->canGoTo($piece->getX(), $piece->getY());
    }
}