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
        $squareSum = 0;
        $commonParametersCount = 0;
        foreach ($rating1List as $parameterName => $rating1ParameterValue)
        {
            // accept only parameters in both lists
            if (empty($rating2List[$parameterName])) {
                continue;
            }

            $commonParametersCount++;

            $rating2ParameterValue = $rating2List[$parameterName];

            $squareSum += pow(
                $rating1ParameterValue - $rating2ParameterValue,
                2
            );
        }

        // if no common rates, correlation is 0
        if ($commonParametersCount === 0) {
            $coefficient = 0;
        } else {
            $coefficient = 1 / (1 + sqrt($squareSum));
        }

        return new CorrelationCoefficient($coefficient);
    }
}