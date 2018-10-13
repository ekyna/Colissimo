<?php

namespace Ekyna\Component\Colissimo\Base\Definition;

/**
 * Class Date
 * @package Ekyna\Component\Colissimo\Definition
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Date extends AbstractField
{
    /**
     * @var string
     */
    private $format;


    /**
     * @inheritDoc
     */
    public function __construct(string $name, bool $required, string $format = 'Y-m-d')
    {
        parent::__construct($name, $required);

        $this->format = $format;
    }

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
        return $object->format($this->format);
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return \DateTime::createFromFormat($this->format, $data);
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
        return preg_match('~^[0-9-/]{10}$~', $data);
    }

    /**
     * @inheritdoc
     *
     * @param \DateTime $value
     */
    public function formatTo($value)
    {
        return $value->format($this->format);
    }
}
