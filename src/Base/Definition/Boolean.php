<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

/**
 * Class Boolean
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Boolean extends AbstractField
{
    /**
     * @inheritdoc
     */
    public function isEmpty($value): bool
    {
        return is_null($value);
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

        if (!is_bool($value)) {
            $this->throwValidationException("Unexpected boolean value", $prefix);
        }
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return (bool)(int)$object;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return $data ? '1' : '0';
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_bool($data);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return is_int($data);
    }

    /**
     * @inheritdoc
     */
    public function formatTo($value)
    {
        return $value ? '1' : '0';
    }
}
