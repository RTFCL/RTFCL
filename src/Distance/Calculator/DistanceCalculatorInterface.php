<?php

declare(strict_types=1);

namespace PHPML\Distance\Calculator;

use PHPML\Distance\Distance;
use PHPML\Distance\Calculator\Exception\NoCommonParametersException;

interface DistanceCalculatorInterface
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
    ): Distance;
}