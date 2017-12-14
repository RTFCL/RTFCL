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

        $transposedMatrix = new Matrix(
            [
                [1, 5],
                [2, 6],
                [3, 7],
                [4, 8],
            ]
        );

        $this->assertEquals(
            $transposedMatrix,
            $matrix->transpose()
        );

        // transpose of transposed matrix give initial matrix
        $this->assertEquals(
            $matrix,
            $matrix->transpose()->transpose()
        );
    }
}
