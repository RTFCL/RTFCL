namespace RTFCL\Math\Type;

class Matrix
{
    private elements;

    public function __construct(array elements)
    {
        let this->elements = elements;
    }

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
}
