<?php

declare(strict_types=1);

namespace PHPML\SimilarityCoefficient;

class SimilarityCoefficient
{
    /**
     * Similarity coefficient must be float number between 0 and 1
     *
     * @var float
     */
    private $value;

    /**
     * @param float $value
     *
     * @throws \TypeError when value is not numeric
     * @throws \OutOfRangeException when value is not in range 0..1
     */
    public function __construct($value)
    {
        if (!is_numeric($value)) {
            throw new \TypeError('Similarity coefficient must be float number');
        }

        if ($value < 0 || $value > 1) {
            throw new \OutOfRangeException('Similarity coefficient must be float number between 0 and 1');
        }

        $this->value = $value;
    }

    /**
     * @return float
     */
    public function toFloat(): float
    {
        return $this->value;
    }
}