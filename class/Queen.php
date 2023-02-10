<?php

namespace Chess;

class Queen extends ChessPiece {

    /**
     * __construct
     *
     * @param  mixed $x
     * @param  mixed $y
     * @param  mixed $color
     * @return void
     */
    public function __construct(int $x = 1, int $y = 1, int $color = 1)
    {
        parent::__construct($x, $y, $color);
    }

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

        // Check if Queen is moving Vertically, Horizontally or Diagonally
        if($dx == $this->getX() && $dy > 0 || $dy == $this->getY() && $dx > 0|| $dy == $dx) return true;
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