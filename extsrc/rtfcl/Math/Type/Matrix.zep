namespace RTFCL\Math\Type;

class Matrix
{
    private elements;

    public function __construct(elements)
    {
        let this->elements = elements;
    }

    public function transpose() -> <Matrix>
    {
        array transposedElements = [];

        for rowId, row in this->elements {
            for columnId, value in row {
                let transposedElements[columnId][rowId] = value;
            }
        }

        return new self(transposedElements);
    }
}
