<?php

namespace PHPML\Correlation\Calculator;

use PHPML\Correlation\CorrelationCoefficient;
use PHPML\Distance\Calculator\Exception\NoCommonParametersException;
use PHPML\Distance\Calculator\EuclideanDistanceCalculator;

/**
 * @see https://en.wikipedia.org/wiki/Euclidean_distance
 */
class EuclideanDistanceCorrelationCoefficientCalculator implements CorrelationCoefficientCalculatorInterface
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
    ): CorrelationCoefficient {

        try {
            $distance = (new EuclideanDistanceCalculator())->calculate($identity1Scores, $identity2Scores);
            $coefficient = 1 / (1 + $distance->toFloat());
        } catch (NoCommonParametersException $e) {
            $coefficient = 0;
        }

        return new CorrelationCoefficient($coefficient);
    }
}