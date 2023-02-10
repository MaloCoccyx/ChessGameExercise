<?php

namespace Chess;

class Rook extends ChessPiece {

    /**
     * canGoTo
     *
     * @param  mixed $x
     * @param  mixed $y
     * @return bool
     */
    public function canGoTo(int $x, int $y): bool
    {
        if (!parent::isInChessBoard($x, $y) || parent::isOnSameCoord($x, $y)) return false;

        $dx = abs($x - $this->getX());
        $dy = abs($y - $this->getY());

        // Check if Rook is moving Vertically || Horizontally
        if($dx == $this->getX() && $dy > 0 || $dy == $this->getY() && $dx > 0) return true;

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