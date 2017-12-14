<?php
declare(strict_types=1);

namespace RTFCL\Math\Type;

class Matrix
{
    /**
     * @var float[][]
     */
    private $elements;

    /**
     * @param float[][] $elements
     */
    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * Transpose and get new matrix
     *
     * @return Matrix
     */
    public function transpose(): Matrix
    {
        $transposedElements = [];

        foreach ($this->elements as $rowId => $row) {
            foreach ($row as $columnId => $value) {
                $transposedElements[$columnId][$rowId] = $value;
            }
        }

        return new self($transposedElements);
    }

    /**
     * Transpose self
     */
    public function transposeInPlace(): void
    {

    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->elements;
    }
}
