<?php

namespace RTFCL\Distance\Calculator;

use RTFCL\Distance\Distance;
use RTFCL\Distance\Calculator\Exception\NoCommonParametersException;

/**
 * @see https://en.wikipedia.org/wiki/Euclidean_distance
 */
class EuclideanDistanceCalculator implements DistanceCalculatorInterface
{
    /**
     * @param array $identity1Scores
     * @param array $identity2Scores
     *
     * @return Distance
     *
     * @throws NoCommonParametersException
     */
    public function calculate(
        array $identity1Scores,
        array $identity2Scores
    ): Distance {
        $squareSum = 0;
        $commonParametersCount = 0;
        foreach ($identity1Scores as $parameterName => $rating1ParameterValue)
        {
            // accept only parameters in both lists
            if (empty($identity2Scores[$parameterName])) {
                continue;
            }

            $commonParametersCount++;

            $rating2ParameterValue = $identity2Scores[$parameterName];

            $squareSum += pow(
                $rating1ParameterValue - $rating2ParameterValue,
                2
            );
        }

        if ($commonParametersCount === 0) {
            throw new NoCommonParametersException('Sets has no common elements to calculate euclidean distance');
        }

        $distance = sqrt($squareSum);
        return new Distance($distance);
    }
}
