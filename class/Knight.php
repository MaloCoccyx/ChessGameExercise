<?php

namespace Chess;

class Knight extends ChessPiece {

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

        // Check if Knight is moving in L
        // if((pow($dx, 2) + pow($dy, 2) == 5)) return true;

        if(($dx == 2 && $dy == 1) || ($dx == 1 && $dy == 2)) return true;
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