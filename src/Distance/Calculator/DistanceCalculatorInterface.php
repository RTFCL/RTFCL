<?php

declare(strict_types=1);

namespace PHPML\Distance\Calculator;

use PHPML\Distance\Distance;
use PHPML\Distance\Exception\NoCommonParametersException;

interface DistanceCalculatorInterface
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
    ): Distance;
}