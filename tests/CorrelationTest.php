<?php

declare(strict_types=1);

namespace PHPML;

use PHPML\Correlation\Calculator\EuclideanDistanceCorrelationCoefficientCalculator;
use PHPML\Correlation\Calculator\PirsonCorrelationCoefficientCalculator;
use PHPUnit\Framework\TestCase;

class CorrelationTest extends TestCase
{
    public function metricsDataProvider()
    {
        return [
            'euclidean' => [
                EuclideanDistanceCorrelationCoefficientCalculator::class,
            ],
            'pirson' => [
                PirsonCorrelationCoefficientCalculator::class,
            ],
        ];
    }

    /**
     * @dataProvider metricsDataProvider
     *
     * @param string $metricClassName
     */
    public function testCorrelationRelevance(string $metricClassName)
    {
        $sourceRating = [
            'Whiskey' => 5.0,
            'Brandy' => 4.7,
            'Tequila' => 4.0,
            'Rum' => 3.9,
            'Gin' => 3.0,
            'Wine' => 4.1,
            'Beer' => 4.9,
            'Gorilka' => 0.1,
        ];

        $moreCorrelatedRating = [
            'Whiskey' => 4.0,
            'Tequila' => 4.5,
            'Gin' => 4.0,
            'Gorilka' => 4.0,
        ];

        $lessCorrelatedRating = [
            'Brandy' => 4.0,
            'Beer' => 5,
            'Gorilka' => 5,
            'Port' => 4.5,
        ];

        $metric = new EuclideanDistanceCorrelationCoefficientCalculator();

        // different taste
        $moreCorrelatedCoefficient = $metric->calculate(
            $sourceRating,
            $moreCorrelatedRating
        );


        // like taste
        $lessCorrelatedCoefficient = $metric->calculate(
            $sourceRating,
            $lessCorrelatedRating
        );

        $this->assertTrue($moreCorrelatedCoefficient->toFloat() > $lessCorrelatedCoefficient->toFloat());
    }

    /**
     * @dataProvider metricsDataProvider
     *
     * @param string $metricClassName
     */
    public function testFullCorrelation(string $metricClassName)
    {
        $sourceRating = [
            'Whiskey' => 5.0,
            'Brandy' => 4.7,
            'Tequila' => 4.0,
            'Rum' => 3.9,
            'Gin' => 3.0,
            'Wine' => 4.1,
            'Beer' => 4.9,
            'Gorilka' => 0.1,
        ];

        $fullyCorrelatedRating = [
            'Whiskey' => 5.0,
            'Brandy' => 4.7,
            'Tequila' => 4.0,
            'Rum' => 3.9,
            'Gin' => 3.0,
        ];

        $metric = new EuclideanDistanceCorrelationCoefficientCalculator();

        // same taste
        $coefficient = $metric->calculate(
            $sourceRating,
            $fullyCorrelatedRating
        );

        $this->assertSame(1.0, $coefficient->toFloat());
    }

    /**
     * @dataProvider metricsDataProvider
     *
     * @param string $metricClassName
     */
    public function testNotCorrelated(string $metricClassName)
    {
        $sourceRating = [
            'Whiskey' => 5.0,
            'Brandy' => 4.7,
            'Tequila' => 4.0,
            'Rum' => 3.9,
            'Gin' => 3.0,
            'Wine' => 4.1,
            'Beer' => 4.9,
            'Gorilka' => 0.1,
        ];

         $notCorrelatedRating = [
            'Apple Juice' => 5,
            'Milk' => 5,
        ];

        $metric = new EuclideanDistanceCorrelationCoefficientCalculator();

        // opposite taste
        $coefficient = $metric->calculate(
            $sourceRating,
            $notCorrelatedRating
        );

        $this->assertSame(0.0, $coefficient->toFloat());
    }
}