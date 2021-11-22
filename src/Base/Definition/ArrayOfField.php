<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 * Class ArrayOfField
 * @package Ekyna\Component\Colissimo\Base\Definition
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property \Symfony\Component\Serializer\Normalizer\AbstractNormalizer $serializer
 */
class ArrayOfField extends AbstractField implements SerializerAwareInterface
{
    use SerializerAwareTrait;

    /**
     * @var FieldInterface
     */
    private $field;


    /**
     * Constructor.
     *
     * @param string $name
     * @param bool   $required
     * @param FieldInterface $field
     */
    public function __construct(string $name, bool $required, FieldInterface $field)
    {
        parent::__construct($name, $required);

        $this->field = $field;
    }

    /**
     * Returns the field.
     *
     * @return FieldInterface
     */
    public function getField()
    {
        return $this->field;
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

        if (!is_array($value)) {
            $this->throwValidationException("Expected array", $prefix);
        }

        foreach ($value as $val) {
            $this->field->validate($val, $prefix);
        }
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $normalized = [];
        foreach ($object as $value) {
            $normalized[] = $this->field->normalize($value, $format, $context);
        }

        return $normalized;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $denormalized = [];
        foreach ($data as $value) {
            $denormalized[] = $this->field->denormalize($value, $format, $context);
        }

        return $denormalized;
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_array($data);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return is_array($data);
    }

    /**
     * @inheritdoc
     *
     * @param \Ekyna\Component\Colissimo\Base\Model\Collection $value
     */
    public function toArray($value)
    {
        if (empty($value)) {
            return null;
        }

        $output = [];
        foreach ($value as $val) {
            $output[] = $this->field->toArray($val);
        }

        return $output;
    }
}
