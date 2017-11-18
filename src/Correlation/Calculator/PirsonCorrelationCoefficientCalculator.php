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

        $rating1Sum = 0;
        $rating2Sum = 0;

        $rating1SquareSum = 0;
        $rating2SquareSum = 0;

        $ratingMultiplicationSum = 0;

        $commonParametersCount = 0;

        foreach ($rating1List as $parameterName => $rating1ParameterValue) {
            // accept only parameters in both lists
            if (empty($rating2List[$parameterName])) {
                continue;
            }

            $commonParametersCount++;

            $rating2ParameterValue = $rating2List[$parameterName];

            $rating1Sum += $rating1ParameterValue;
            $rating2Sum += $rating2ParameterValue;

            $rating1SquareSum += pow($rating1ParameterValue, 2);
            $rating2SquareSum += pow($rating2ParameterValue, 2);

            $ratingMultiplicationSum += $rating1ParameterValue * $rating2ParameterValue;
        }

        if ($commonParametersCount === 0) {
            $coefficient = 0;
        } else {
            $num = $ratingMultiplicationSum - ($rating1Sum * $rating2Sum / $commonParametersCount);
            $den = sqrt(
                (
                    $rating1SquareSum - pow($rating1Sum, 2) / $commonParametersCount
                ) * (
                    $rating2SquareSum - pow($rating2Sum, 2) / $commonParametersCount
                )
            );

            if ($den === 0) {
                $coefficient = 0;
            } else {
                $coefficient = $num / $den;
            }
        }

        return new CorrelationCoefficient($coefficient);
    }
}