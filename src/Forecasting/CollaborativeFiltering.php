<?php

declare(strict_types=1);

namespace PHPML\Forecasting;

use PHPML\Correlation\Calculator\CorrelationCoefficientCalculatorInterface;

/**
 * @see https://en.wikipedia.org/wiki/Collaborative_filtering
 */
class CollaborativeFiltering
{
    /**
     * @param iterable $dataSet
     * @param array $sourceRating
     * @param CorrelationCoefficientCalculatorInterface $correlationCalculator
     *
     * @return array rating of $dataSet keys from most relevant to less relevant
     */
    public function getScores(
        iterable $dataSet,
        array $sourceRating,
        CorrelationCoefficientCalculatorInterface $correlationCalculator
    ): array {
        $scores = [];

        foreach ($dataSet as $identity => $dataSetRating) {
            $correlationCoefficient = $correlationCalculator->calculate($dataSetRating, $sourceRating);
            $scores[$identity] = $correlationCoefficient->toFloat();
        }

        asort($scores, SORT_NUMERIC);

        return $scores;
    }
}