<?php

declare(strict_types=1);

namespace RTFCL\Correlation\Calculator;

use RTFCL\Correlation\CorrelationCoefficient;

class PirsonCorrelationCoefficientCalculator implements CorrelationCoefficientCalculatorInterface
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

        $identity1ScoreSum = 0;
        $identity2ScoreSum = 0;

        $identity1ScoreSquareSum = 0;
        $identity2ScoreSquareSum = 0;

        $identityScoreMultiplicationSum = 0;

        $commonScoresCount = 0;

        foreach ($identity1Scores as $scoreName => $identity1ScoreValue) {
            // accept only parameters in both lists
            if (empty($identity2Scores[$scoreName])) {
                continue;
            }

            $commonScoresCount++;

            $identity2ScoreValue = $identity2Scores[$scoreName];

            $identity1ScoreSum += $identity1ScoreValue;
            $identity2ScoreSum += $identity2ScoreValue;

            $identity1ScoreSquareSum += pow($identity1ScoreValue, 2);
            $identity2ScoreSquareSum += pow($identity2ScoreValue, 2);

            $identityScoreMultiplicationSum += $identity1ScoreValue * $identity2ScoreValue;
        }

        if ($commonScoresCount === 0) {
            $coefficient = 0;
        } else {
            $num = $identityScoreMultiplicationSum - ($identity1ScoreSum * $identity2ScoreSum / $commonScoresCount);
            $den = sqrt(
                (
                    $identity1ScoreSquareSum - pow($identity1ScoreSum, 2) / $commonScoresCount
                ) * (
                    $identity2ScoreSquareSum - pow($identity2ScoreSum, 2) / $commonScoresCount
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
