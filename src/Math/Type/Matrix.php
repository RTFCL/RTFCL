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
        return $this->transposeByLoop();
    }

    private function transposeByLoop(): Matrix
    {
        $transposedElements = [];

        foreach ($this->elements as $rowId => $row) {
            foreach ($row as $columnId => $value) {
                $transposedElements[$columnId][$rowId] = $value;
            }
        }

        return new self($transposedElements);
    }

    private function transposeByMap(): Matrix
    {
        return new self(array_map(null, ...$this->elements));
    }

    private function transposeByColumn(): Matrix
    {
        $transposedElements = [];

        for ($columnId = 0; $columnId < count($this->elements[0]); $columnId++) {
            $transposedElements[$columnId] = array_column($this->elements, $columnId);
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
