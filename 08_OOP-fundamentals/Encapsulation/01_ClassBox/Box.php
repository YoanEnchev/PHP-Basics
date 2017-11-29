<?php

class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function calcSurfaceArea(): float
    {
        $length = $this->length;
        $width = $this->width;
        $height = $this->height;

        return 2 * ($length * $width + $length * $height + $width * $height);
    }

    public function calcLateralSurfaceArea()
    {
        $length = $this->length;
        $width = $this->width;
        $height = $this->height;

        return 2 * $height * ($length + $width);
    }

    public function calcVolume()
    {
        $length = $this->length;
        $width = $this->width;
        $height = $this->height;

        return $length * $width * $height;
    }
}