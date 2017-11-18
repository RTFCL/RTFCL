<?php

namespace PHPML\Correlation\Calculator;

use PHPML\Correlation\CorrelationCoefficient;

/**
 * @see https://en.wikipedia.org/wiki/Euclidean_distance
 */
class EuclideanDistanceCoefficientCalculator implements SimilarityCoefficientCalculatorInterface
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
        // get list of common rates
        $squareSumList = [];
        foreach ($rating1List as $parameterName => $rating1ParameterValue)
        {
            if (empty($rating2List[$parameterName])) {
                continue;
            }

            $squareSumList[] = pow(
                $rating1ParameterValue - $rating2List[$parameterName],
                2
            );
        }

        // if no common rates, correlation is 0
        if (count($squareSumList) === 0) {
            $coefficient = 0;
        } else {
            $coefficient = 1 / (1 + sqrt(array_sum($squareSumList)));
        }

        return new CorrelationCoefficient($coefficient);
    }
}