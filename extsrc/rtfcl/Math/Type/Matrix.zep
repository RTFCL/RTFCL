namespace RTFCL\Math\Type;

class Matrix
{
    /**
     * @var float[][]
     */
    private elements;

    /**
     * @param float[][] $elements
     */
    public function __construct(array $elements)
    {
        this->elements = elements;
    }

    /**
     * @return Matrix
     */
    public function transpose() -> Matrix
    {
        transposedElements = [];

        for rowId, row in this->elements {
            for columnId, value in row {
                transposedElements[columnId][rowId] = value;
            }
        }

        return new self(transposedElements);
    }
}
