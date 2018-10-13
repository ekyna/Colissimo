<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

use Ekyna\Component\Colissimo\Base\Enum\EnumInterface;

/**
 * Class Enum
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Enum extends AbstractField
{
    /**
     * @var bool
     */
    private $multiple;

    /**
     * @var string
     */
    private $class;


    /**
     * Constructor.
     *
     * @param string $name
     * @param bool   $required
     * @param bool   $multiple
     * @param string $class
     */
    public function __construct(string $name, bool $required, bool $multiple, string $class)
    {
        if (!is_subclass_of($class, EnumInterface::class)) {
            throw new \Ekyna\Component\Colissimo\Base\Exception\RuntimeException("Class $class must implement " . EnumInterface::class);
        }

        parent::__construct($name, $required);

        $this->multiple = $multiple;
        $this->class = $class;
    }

    /**
     * @inheritdoc
     */
    public function validate($value, string $prefix = null): void
    {
        if (empty($value)) {
            if ($this->required) {
                $this->throwValidationException("Value is required", $prefix);
            }

            return;
        }

        if ($this->multiple) {
            if (!is_array($value)) {
                $this->throwValidationException("Expected array value", $prefix);
            }

            foreach ($value as $val) {
                if (!call_user_func([$this->class, 'isValid'], $val)) {
                    $this->throwValidationException("Unexpected value '$val'", $prefix);
                }
            }

            return;
        }

        if (!call_user_func([$this->class, 'isValid'], $value)) {
            $this->throwValidationException("Unexpected value '$value'", $prefix);
        }
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        if ($this->multiple) {
            $normalized = [];

            foreach ($object as $value) {
                $normalized = call_user_func([$this->class, 'normalize'], $value);
            }

            return $normalized;
        }

        return call_user_func([$this->class, 'normalize'], $object);
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if ($this->multiple) {
            $normalized = [];

            foreach ($data as $value) {
                $normalized = call_user_func([$this->class, 'denormalize'], $value);
            }

            return $normalized;
        }

        return call_user_func([$this->class, 'denormalize'], $data);
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_scalar($data) || is_array($data);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return is_scalar($data) || is_array($data);
    }
}
