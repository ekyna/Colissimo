<?php

namespace Ekyna\Component\Colissimo\Base\Definition;

/**
 * Class Amount
 * @package Ekyna\Component\Colissimo\Definition
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Amount extends Decimal
{
    /**
     * Constructor.
     *
     * @param string $name
     * @param bool   $required
     */
    public function __construct(string $name, bool $required)
    {
        parent::__construct($name, $required, 10, 2);
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return (string)round($object * 100);
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return floatval($data / 100);
    }

    /**
     * @inheritdoc
     */
    public function formatTo($value)
    {
        return (string)round($value * 100);
    }
}
