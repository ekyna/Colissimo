<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

use Ekyna\Component\Colissimo\Base\Exception\RuntimeException;
use Ekyna\Component\Colissimo\Base\Model\ModelInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 * Class Model
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property \Symfony\Component\Serializer\Normalizer\AbstractNormalizer $serializer
 */
class Model extends AbstractField implements SerializerAwareInterface
{
    use SerializerAwareTrait;

    /**
     * @var string
     */
    private $class;


    /**
     * Constructor.
     *
     * @param string $name
     * @param bool   $required
     * @param string $class
     */
    public function __construct(string $name, bool $required, string $class)
    {
        parent::__construct($name, $required);

        if (!is_subclass_of($class, ModelInterface::class)) {
            throw new RuntimeException("Class $class must implements " . ModelInterface::class);
        }

        $this->class = $class;
    }

    /**
     * @inheritdoc
     *
     * @param \Ekyna\Component\Colissimo\Base\Model\ModelInterface $value
     */
    public function isEmpty($value): bool
    {
        foreach ($value->getDefinition()->getFields() as $name => $field) {
            if (!$field->isEmpty($value->{$name})) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns the model class.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @inheritdoc
     */
    public function validate($value, string $prefix = null): void
    {
        if (null === $value) {
            if ($this->required) {
                $this->throwValidationException("Value is required", $prefix);
            }

            return;
        }

        if (!$value instanceof $this->class) {
            $this->throwValidationException("Expected instance of " . $this->class, $prefix);
        }

        /** @var ModelInterface $value  */
        $value->validate($prefix);
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return $this->serializer->normalize($object, $format, $context);
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return $this->serializer->denormalize($data, $this->class, $format, $context);
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof $this->class;
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
     *
     * @param ModelInterface $value
     */
    public function toArray($value)
    {
        return $value->toArray();
    }
}
