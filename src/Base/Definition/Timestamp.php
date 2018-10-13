<?php

namespace Ekyna\Component\Colissimo\Base\Definition;

/**
 * Class Timestamp
 * @package Ekyna\Component\Colissimo\Definition
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Timestamp extends AbstractField
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

        if (!$value instanceof \DateTime) {
            $this->throwValidationException("Expected instance of " . \DateTime::class, $prefix);
        }
    }

    /**
     * @inheritDoc
     *
     * @param \DateTime $object
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return $object->getTimestamp();
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return (new \DateTime())->setTimestamp(substr((string)$data, 0, 10));
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \DateTime;
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return preg_match('~^[0-9]{10-13}$~', $data);
    }

    /**
     * @inheritdoc
     *
     * @param \DateTime $value
     */
    public function formatTo($value)
    {
        return $value->getTimestamp();
    }
}
