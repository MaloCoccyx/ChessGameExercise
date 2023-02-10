<?php

namespace Chess;

abstract class ChessPiece {

    public const WHITE = 1;
    public const BLACK = 2;
    public const MIN_COOR = 1;
    public const MAX_COOR = 8;

    private int $x;
    private int $y;
    private int $color;
    
    /**
     * __construct
     * $x - axe x
     * $y - axe y
     * $color - piece color
     *
     * @param  mixed $x
     * @param  mixed $y
     * @param  mixed $color
     * @return void
     */
    public function __construct(int $x = 1, int $y = 1, int $color = 1)
    {
        $this->setX($x);
        $this->setY($y);
        $this->setColor($color);
    }

    /**
     * setX using setCoord
     *
     * @param  int $x
     * @return int
     */
    private function setX(int $x): self
    {
        $this->x = abs($this->setCoord($x));
        return $this;
    }

    /**
     * getX
     *
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * setY using setCoord
     *
     * @param  int $y
     * @return int
     */
    private function setY(int $y): self
    {
        $this->y = abs($this->setCoord($y));
        return $this;
    }

    /**
     * getY
     *
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * setCoord with int passed in params
     *
     * @param  int $coord
     * @return int
     */
    private function setCoord(int $coord): int
    {
        if($coord < self::MIN_COOR) return self::MIN_COOR;
        elseif($coord > self::MAX_COOR) return self::MAX_COOR;
        else return abs($coord);
    }

    /**
     * setColor if is WHITE or BLACK ("Blanche" || "Noire")
     *
     * @param  mixed $color
     * @return int
     */
    private function setColor(int $color): int
    {
        if($color <= self::WHITE) return $this->color = self::WHITE;
        else return $this->color = self::BLACK;
    }

    /**
     * getColor
     *
     * @param  mixed $color
     * @return string
     */
    public function getColor(): int
    {
        // if($this->color == self::WHITE) return self::WHITE;
        // elseif($this->color == self::BLACK) return self::BLACK;
        return $this->color;
    }

    /**
     * getColorCase using % 2
     *
     * @return string
     */
    public function getColorCase(): string
    {
        return (($this->getX() + $this->getY()) % 2) == 1 ? self::BLACK : self::WHITE;
    }

    /**
     * isInChessBoard
     * Check if coord x:y is in Chess board
     *
     * @param  mixed $x
     * @param  mixed $y
     * @return bool
     */
    public final function isInChessBoard(int $x, int $y): bool
    {
        if($x > self::MAX_COOR || $x < self::MIN_COOR || $y > self::MAX_COOR || $y < self::MIN_COOR) return false;
        return true;

        // return !($x < 1 || $x > 8 || $y < 1 || $y > 8);
    }

    /**
     * isOnSameCoord
     *
     * @param  mixed $x
     * @param  mixed $y
     * @return bool
     */
    public final function isOnSameCoord(int $x, int $y): bool
    {
        return ($x == $this->getX() && $y == $this->getY());
    }

    /**
     * __toString
     *
     * @return void
     */
    public function __toString()
    {
        return get_class($this) . 
        ($this->getColor() === self::WHITE ? " Blanche" : " Noire") .
        " en " . $this->getX() . ", " . $this->getY() . " <br>Case : "
        . ($this->getColorCase() === self::BLACK ? " Noire" : " Blanche") .
        "\n";
    }

    public abstract function canGoTo(int $x, int $y): bool;
}