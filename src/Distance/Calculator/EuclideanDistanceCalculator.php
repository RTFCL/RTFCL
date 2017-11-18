<?php

namespace PHPML\Distance\Calculator;

use PHPML\Distance\Distance;
use PHPML\Distance\Calculator\Exception\NoCommonParametersException;

/**
 * @see https://en.wikipedia.org/wiki/Euclidean_distance
 */
class EuclideanDistanceCalculator implements DistanceCalculatorInterface
{
    /**
     * @param array $rating1List
     * @param array $rating2List
     *
     * @return Distance
     *
     * @throws NoCommonParametersException
     */
    public function calculate(
        array $rating1List,
        array $rating2List
    ): Distance {
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

        if ($commonParametersCount === 0) {
            throw new NoCommonParametersException('Sets has no common elements to calculate euclidean distance');
        }

        $distance = sqrt($squareSum);
        return new Distance($distance);
    }
}