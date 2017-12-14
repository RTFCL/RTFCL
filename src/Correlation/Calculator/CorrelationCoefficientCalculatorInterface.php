<?php

declare(strict_types=1);

namespace RTFCL\Correlation\Calculator;

use RTFCL\Correlation\CorrelationCoefficient;

interface CorrelationCoefficientCalculatorInterface
{
    /**
     * @param array $identity1Scores
     * @param array $identity2Scores
     *
     * @return CorrelationCoefficient
     */
    public function calculate(
        array $identity1Scores,
        array $identity2Scores
    ): CorrelationCoefficient;
}
