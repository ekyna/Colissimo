<?php

namespace Ekyna\Component\Colissimo\Base\Definition;

use Ekyna\Component\Colissimo\Base\Model\Field;

/**
 * Class Fields
 * @package Ekyna\Component\Colissimo\Definition
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Fields extends ArrayOfModel
{
    /**
     * Constructor.
     *
     * @param bool $required
     */
    public function __construct(bool $required)
    {
        parent::__construct('fields', $required, Field::class);
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $normalized = [];

        /** @var Field $field */
        foreach ($object as $field) {
            $normalized[$field->key] = $field->value;
        }

        return $normalized;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $denormalized = [];
        if (isset($data['field']) && !empty($data['field'])) {
            foreach ($data['field'] as $field) {
                $denormalized[] = new Field($field['key'], $field['value']);
            }
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
     * @inheritDoc
     */
    public function toArray($value)
    {
        throw new \Exception("Not yet implemented"); // TODO: Implement fromArray() method.
    }
}
