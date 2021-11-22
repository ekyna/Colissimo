<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

/**
 * Class Decimal
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Decimal extends AbstractField
{
    /**
     * @var int
     */
    private $scale;

    /**
     * @var int
     */
    private $precision;


    /**
     * Constructor.
     *
     * @param string $name
     * @param bool   $required
     * @param int    $scale
     * @param int    $precision
     */
    public function __construct(string $name, bool $required, int $scale, int $precision)
    {
        parent::__construct($name, $required);

        $this->scale = $scale;
        $this->precision = $precision;
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

        if (!is_numeric($value) || empty($value)) {
            $this->throwValidationException("Unexpected string value", $prefix);
        }

        $value = (string)$value;

        // TODO preg
        if (false !== strpos($value, '.')) {
            list($integer, $decimal) = explode('.', $value);
        } elseif (0 === strpos($value, '.')) {
            $integer = '0';
            $decimal = substr($value, 1);
        } else {
            $integer = $value;
            $decimal = '0';
        }

        if (strlen($integer) > $this->scale) {
            $this->throwValidationException("Expected decimal with max scale $this->scale", $prefix);
        }

        if (strlen($decimal) > $this->precision) {
            $this->throwValidationException("Expected decimal with max precision $this->precision", $prefix);
        }
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return (string)round($object, $this->precision);
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return floatval($data);
    }

    /**
     * @inheritDoc
     */
    public function formatTo($value)
    {
        return (string)round($value, $this->precision);
    }
}
