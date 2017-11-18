<?php

declare(strict_types=1);

namespace PHPML\Correlation;

/**
 * Correlation coefficient must be float number between -1 and 1
 * 0 - when sets not correlated
 * 1 - when sets fully correlated
 * -1 - when set fully negatively correlated
 */
class CorrelationCoefficient
{
    /**
     * Correlation coefficient must be float number between -1 and 1
     *
     * @var float
     */
    private $value;

    /**
     * @param float $value
     *
     * @throws \TypeError when value is not numeric
     * @throws \OutOfRangeException when value is not in range -1..1
     */
    public function __construct($value)
    {
        if (!is_numeric($value)) {
            throw new \TypeError('Similarity coefficient must be float number');
        }

        if ($value < -1 || $value > 1) {
            throw new \OutOfRangeException('Similarity coefficient must be float number between -1 and 1');
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