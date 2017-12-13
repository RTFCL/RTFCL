<?php

namespace Sokil\IsoCodes\Databases;

use PHPML\Math\Type\Matrix;

class MatrixBench
{
    /**
     * @param int $rows
     * @param int $cols
     *
     * @return Matrix
     */
    private function createMatrix(int $rows, int $cols): array
    {
        $matrixElements = [];
        for ($rowId = 0; $rowId < $rows; $rowId++) {
            for ($columnId = 0; $columnId < $cols; $columnId++) {
                $matrixElements[$rowId][$columnId] = $columnId;
            }
        }

        return $matrixElements;
    }

    public function provideMatrixToTranspose()
    {
        return [
            [
                'matrix' => $this->createMatrix(1000, 1000),
            ],
        ];
    }

    /**
     * @Revs(50)
     * @ParamProviders({"provideMatrixToTranspose"})
     */
    public function benchTranspose($params)
    {
        (new Matrix($params['matrix']))->transpose();
    }
}
