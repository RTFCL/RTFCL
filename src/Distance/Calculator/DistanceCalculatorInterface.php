<?php

declare(strict_types=1);

namespace RTFCL\Distance\Calculator;

use RTFCL\Distance\Distance;
use RTFCL\Distance\Calculator\Exception\NoCommonParametersException;

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
