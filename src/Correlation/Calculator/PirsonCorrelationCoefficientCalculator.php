<?php

declare(strict_types=1);

namespace PHPML\Correlation\Calculator;

use PHPML\Correlation\CorrelationCoefficient;

class PirsonCorrelationCoefficientCalculator implements SimilarityCoefficientCalculatorInterface
{
    /**
     * @param array $rating1List
     * @param array $rating2List
     *
     * @return CorrelationCoefficient
     */
    public function calculate(
        array $rating1List,
        array $rating2List
    ): CorrelationCoefficient {

    }
}