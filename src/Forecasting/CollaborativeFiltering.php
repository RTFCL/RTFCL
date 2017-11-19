<?php

declare(strict_types=1);

namespace PHPML\Forecasting;

use PHPML\Correlation\Calculator\CorrelationCoefficientCalculatorInterface;
use PHPML\Correlation\CorrelationCoefficient;

/**
 * @see https://en.wikipedia.org/wiki/Collaborative_filtering
 */
class CollaborativeFiltering
{
    /**
     * @param iterable $identityListScores array of relations [identity => scores]
     * @param array $sourceIdentityScores
     * @param CorrelationCoefficientCalculatorInterface $correlationCalculator
     *
     * @return array rating of $dataSet keys from most relevant to less relevant
     */
    public function getPrioritizedIdentities(
        iterable $identityListScores,
        array $sourceIdentityScores,
        CorrelationCoefficientCalculatorInterface $correlationCalculator
    ): array {
        $scores = [];

        foreach ($identityListScores as $identity => $identityScores) {
            $correlationCoefficient = $correlationCalculator->calculate($identityScores, $sourceIdentityScores);
            $scores[$identity] = $correlationCoefficient;
        }

        uasort(
            $scores,
            function(CorrelationCoefficient $coefficient1, CorrelationCoefficient $coefficient2) {
                return $coefficient2->toFloat() <=> $coefficient1->toFloat();
            }
        );

        return $scores;
    }
}