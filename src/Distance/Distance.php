<?php

declare(strict_types=1);

namespace PHPML\Distance;

/**
 * Distance must be float number greater or equal 0
 */
class Distance
{
    /**
     * Correlation coefficient must be float number greater or equal 0
     *
     * @var float
     */
    private $value;

    /**
     * @param float $value
     *
     * @throws \TypeError when value is not numeric
     * @throws \OutOfRangeException when value is less then 0
     */
    public function __construct($value)
    {
        if (!is_numeric($value)) {
            throw new \TypeError('Similarity coefficient must be float number');
        }

        if ($value < 0) {
            throw new \OutOfRangeException('Similarity coefficient must be float number greater or equal 0');
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