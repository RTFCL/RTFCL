namespace RTFCL\Math\Type;

class Matrix
{
    private elements;

    private rows;

    private cols;

    public function __construct(array elements)
    {
        let this->elements = elements;
        let this->rows = count(elements);
        let this->cols = count(elements[0]);
    }

    /**
     * Transpose and get new matrix
     *
     * @return Matrix
     */
    public function transpose() -> <Matrix>
    {
        array transposedElements = [];
        array transposedElementsRow;

        long rowId, columnId;
        for columnId in range(0, this->cols - 1) {
            let transposedElementsRow = [];
            for rowId in range(0, this->rows - 1) {
                let transposedElementsRow[rowId] = this->elements[rowId][columnId];
            }
            let transposedElements[columnId] = transposedElementsRow;
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
