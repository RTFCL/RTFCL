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
     * @param array $rating1List
     * @param array $rating2List
     *
     * @return CorrelationCoefficient
     */
    public function calculate(
        array $rating1List,
        array $rating2List
    ): CorrelationCoefficient {

        try {
            $distance = (new EuclideanDistanceCalculator())->calculate($rating1List, $rating2List);
            $coefficient = 1 / (1 + $distance->toFloat());
        } catch (NoCommonParametersException $e) {
            $coefficient = 0;
        }

        return new CorrelationCoefficient($coefficient);
    }
}