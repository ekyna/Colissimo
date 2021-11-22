<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

/**
 * Class Numeric
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Numeric extends AbstractField
{
    /**
     * @var int
     */
    private $size;


    /**
     * Constructor.
     *
     * @param string $name
     * @param bool   $required
     * @param int    $size
     */
    public function __construct(string $name, bool $required, int $size)
    {
        parent::__construct($name, $required);

        $this->size = $size;
    }

    /**
     * @inheritdoc
     */
    public function validate($value, string $prefix = null): void
    {
        if (is_null($value)) {
            if ($this->required) {
                $this->throwValidationException("Value is required", $prefix);
            }

            return;
        }

        if ($value != intval($value)) {
            $this->throwValidationException("Unexpected integer value", $prefix);
        }

        if (strlen((string)$value) > $this->size) {
            $this->throwValidationException("Expected integer with max size $this->size", $prefix);
        }
    }
}
