<?php

class Box
{
    private $length;
    private $width;
    private $height;

    public function getLength(): float
    {
        return $this->length;
    }

    private function setLength(float $length)
    {
        if ($length <= 0) {
            throw new Exception("Length cannot be zero or negative.");
        }

        $this->width = $length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    private function setWidth(float $width)
    {
        if ($width <= 0) {
            throw new Exception("Width cannot be zero or negative.");
        }

        $this->width = $width;

    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height)
    {
        if ($height <= 0) {
            throw new Exception("Height cannot be zero or negative.");
        }

        $this->height = $height;

    }

    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
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