<?php
declare(strict_types=1);

namespace PHPML\Math\Type;

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
}
