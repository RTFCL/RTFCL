<?php

declare(strict_types=1);

namespace RTFCL\Forecasting;

use RTFCL\Correlation\Calculator\PirsonCorrelationCoefficientCalculator;
use PHPUnit\Framework\TestCase;

class CollaborativeFilteringTest extends TestCase
{
    public function testGetScores()
    {
        $sourceIdentityScores = [
            'Whiskey' => 5.0,
            'Brandy' => 4.7,
            'Tequila' => 4.0,
            'Rum' => 3.9,
            'Gin' => 3.0,
            'Wine' => 4.1,
            'Beer' => 4.9,
            'Gorilka' => 0.1,
        ];

        $identityListScores = [
            'relevant_4place' => $sourceIdentityScores,
            'notRelevant_1' => [
                'Apple Juice' => 5,
                'Milk' => 5,
            ],
            'relevant_2place' => $sourceIdentityScores,
            'fullyRelevant_1' => [
                'Tequila' => 4.0,
                'Rum' => 3.9,
                'Gin' => 3.0,
                'Wine' => 4.1,
                'Beer' => 4.9,
                'Gorilka' => 0.1,
            ],
            'notRelevant_2' => [
                'Orange Juice' => 5,
                'Milk' => 5,
                'Water' => 4,
            ],
            'relevant_3place' => $sourceIdentityScores,
            'relevant_1place' => $sourceIdentityScores,
            'fullyRelevant_2' => [
                'Whiskey' => 5.0,
                'Brandy' => 4.7,
                'Rum' => 3.9,
                'Gin' => 3.0,
                'Wine' => 4.1,
                'Gorilka' => 0.1,
            ],
        ];

        // add some irrelevance
        $identityListScores['relevant_1place']['Whiskey'] *= 0.8;

        $identityListScores['relevant_2place']['Whiskey'] *= 0.7;
        $identityListScores['relevant_2place']['Brandy'] *= 0.7;

        $identityListScores['relevant_3place']['Whiskey'] *= 0.6;
        $identityListScores['relevant_3place']['Brandy'] *= 0.6;
        $identityListScores['relevant_3place']['Tequila'] *= 0.6;

        $identityListScores['relevant_4place']['Whiskey'] *= 0.5;
        $identityListScores['relevant_4place']['Brandy'] *= 0.5;
        $identityListScores['relevant_4place']['Tequila'] *= 0.5;
        $identityListScores['relevant_4place']['Rum'] *= 0.5;

        $scores = (new CollaborativeFiltering())->getPrioritizedIdentities(
            $identityListScores,
            $sourceIdentityScores,
            new PirsonCorrelationCoefficientCalculator()
        );

        $actualIdentities = array_keys($scores);

        // check fully relevant
        $this->assertSame('fullyRelevant_', substr(array_shift($actualIdentities), 0, -1));
        $this->assertSame('fullyRelevant_', substr(array_shift($actualIdentities), 0, -1));

        // check fully irrelevant
        $this->assertSame('notRelevant_', substr(array_pop($actualIdentities), 0, -1));
        $this->assertSame('notRelevant_', substr(array_pop($actualIdentities), 0, -1));

        // check others
        $expectedIdentities = [
            'relevant_1place',
            'relevant_2place',
            'relevant_3place',
            'relevant_4place',
        ];
        $this->assertEquals($expectedIdentities, $actualIdentities);
    }
}
