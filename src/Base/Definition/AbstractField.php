<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

use Ekyna\Component\Colissimo\Base\Exception\ValidationException;

/**
 * Class AbstractField
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
abstract class AbstractField implements FieldInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $required;


    /**
     * Constructor.
     *
     * @param string $name
     * @param bool   $required
     */
    public function __construct(string $name, bool $required)
    {
        $this->name = $name;
        $this->required = $required;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @inheritdoc
     */
    public function isEmpty($value): bool
    {
        return empty($value);
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return (string)$object;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return (string)$data;
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_scalar($data);
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return is_scalar($data);
    }

    /**
     * @inheritdoc
     */
    public function toArray($value)
    {
        if ($this->isEmpty($value)) {
            return null;
        }

        return $this->formatTo($value);
    }

    /**
     * Formats the value.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    protected function formatTo($value)
    {
        return (string)$value;
    }

    /**
     * Throws a validation exception.
     *
     * @param string $message
     * @param string $prefix
     *
     * @throws ValidationException
     */
    protected function throwValidationException(string $message, string $prefix = null)
    {
        throw new ValidationException($message, $this->name, $prefix);
    }
}
