<?php

namespace PHPML\SimilarityCoefficient\Calculator;

use PHPML\SimilarityCoefficient\SimilarityCoefficient;

class PirsonCorrelationCoefficientCalculator implements SimilarityCoefficientCalculatorInterface
{
    /**
     * @param array $rating1List
     * @param array $rating2List
     *
     * @return SimilarityCoefficient
     */
    public function calculate(
        array $rating1List,
        array $rating2List
    ) {

    }
}