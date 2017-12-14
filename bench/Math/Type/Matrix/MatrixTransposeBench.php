<?php

namespace RTFCL\Math\Type\Matrix;

use RTFCL\Math\Type\Matrix;

/**
 * @BeforeMethods({"init"})
 */
class MatrixTransposeBench
{
    /**
     * @var Matrix
     */
    private $matrix;

    public function init()
    {
        $matrixElements = [];
        for ($rowId = 0; $rowId < 1000; $rowId++) {
            for ($columnId = 0; $columnId < 1000; $columnId++) {
                $matrixElements[$rowId][$columnId] = $columnId;
            }
        }

        $this->matrix = new Matrix($matrixElements);
    }

    /**
     * @Revs(1)
     */
    public function benchTranspose()
    {
        $this->matrix->transpose();
    }
}
