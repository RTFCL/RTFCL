<?php

declare(strict_types=1);

namespace RTFCL\Math\Type;

use PHPUnit\Framework\TestCase;

class MatrixTest extends TestCase
{
    public function testTranspose()
    {
        $matrix = new Matrix(
            [
                [1, 2, 3, 4],
                [5, 6, 7, 8],
            ]
        );

        $this->assertEquals(
            $matrix,
            $matrix->transpose()->transpose()
        );
    }
}
