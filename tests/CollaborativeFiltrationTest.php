<?php

declare(strict_types=1);

namespace PHPML;

use PHPML\Correlation\Calculator\EuclideanDistanceCoefficientCalculator;
use PHPUnit\Framework\TestCase;

class CollaborativeFiltrationTest extends TestCase
{
    public function testSimilarityByEuclideanDistanceCoefficient()
    {
        $ratingLists = [
            'person1' => [
                'Whiskey' => 5.0,
                'Brandy' => 4.7,
                'Tequila' => 4.0,
                'Rum' => 3.9,
                'Gin' => 3.0,
                'Wine' => 4.1,
                'Beer' => 4.9,
                'Gorilka' => 0.1,
            ],
            'person2' => [
                'Brandy' => 4.0,
                'Beer' => 5,
                'Gorilka' => 5,
                'Port' => 4.5,
            ],
            'person3' => [
                'Whiskey' => 4.0,
                'Tequila' => 4.5,
                'Gin' => 4.0,
                'Gorilka' => 4.0,
            ],
            'person4' => [
                'Whiskey' => 5.0,
                'Brandy' => 4.7,
                'Tequila' => 4.0,
                'Rum' => 3.9,
                'Gin' => 3.0,
            ],
            'person5' => [
                'Apple Juice' => 5,
                'Milk' => 5,
            ],
        ];

        $euclideanDistanceCoefficient = new EuclideanDistanceCoefficientCalculator();

        // different taste
        $person1ToPerson2Coefficient = $euclideanDistanceCoefficient->calculate(
            $ratingLists['person1'],
            $ratingLists['person2']
        );


        // like taste
        $person1ToPerson3Coefficient = $euclideanDistanceCoefficient->calculate(
            $ratingLists['person1'],
            $ratingLists['person3']
        );

        // like taste correlation bigger than different taste
        $this->assertTrue($person1ToPerson2Coefficient->toFloat() < $person1ToPerson3Coefficient->toFloat());

        // same taste
        $person1ToPerson4Coefficient = $euclideanDistanceCoefficient->calculate(
            $ratingLists['person1'],
            $ratingLists['person4']
        );

        $this->assertSame(1.0, $person1ToPerson4Coefficient->toFloat());

        // opposite taste
        $person1ToPerson4Coefficient = $euclideanDistanceCoefficient->calculate(
            $ratingLists['person1'],
            $ratingLists['person5']
        );

        $this->assertSame(0.0, $person1ToPerson4Coefficient->toFloat());
    }

    public function testSimilarityByPirsonCorrelationCoefficient()
    {

    }
}