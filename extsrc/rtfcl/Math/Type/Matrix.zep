namespace RTFCL\Math\Type;

class Matrix
{
    private elements;

    public function __construct(array elements)
    {
        let this->elements = elements;
    }

    /**
     * Transpose and get new matrix
     *
     * @return Matrix
     */
    public function transpose() -> <Matrix>
    {
        array transposedElements = [];

        var rowId, columnId, row, value;
        for rowId, row in this->elements {
            for columnId, value in row {
                let transposedElements[columnId][rowId] = value;
            }
        }

        return new self(transposedElements);
    }

    /**
     * Transpose self
     */
    public function transposeInPlace() -> void
    {

    }

    /**
     * Get array
     */
    public function toArray() -> array
    {
        return this->elements;
    }
}
