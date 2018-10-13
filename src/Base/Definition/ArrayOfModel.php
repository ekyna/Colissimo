<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

use Ekyna\Component\Colissimo\Base\Exception\RuntimeException;
use Ekyna\Component\Colissimo\Base\Model;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 * Class ArrayOfModel
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property \Symfony\Component\Serializer\Normalizer\AbstractNormalizer $serializer
 */
class ArrayOfModel extends AbstractField implements SerializerAwareInterface
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

        if (!is_subclass_of($class, Model\ModelInterface::class)) {
            throw new RuntimeException("Class $class must implements " . Model\ModelInterface::class);
        }

        $this->class = $class;
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
        if (empty($value)) {
            if ($this->required) {
                $this->throwValidationException("Value is required", $prefix);
            }

            return;
        }

        if (!$value instanceof Model\Collection) {
            $this->throwValidationException("Expected instance of " . Model\Collection::class,
                $prefix);
        }

        foreach ($value as $model) {
            if (!$model instanceof $this->class) {
                $this->throwValidationException("Expected instance of " . $this->class, $prefix);
            }

            /** @var Model\ModelInterface $model */
            $model->validate($prefix);
        }
    }

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $normalized = [];
        foreach ($object as $item) {
            $normalized[] = $this->serializer->normalize($item, $format, $context);
        }

        return $normalized;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $denormalized = [];
        foreach ($data as $item) {
            $denormalized[] = $this->serializer->denormalize($item, $this->class, $format, $context);
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
     * @param Model\Collection $value
     */
    public function toArray($value)
    {
        if (empty($value)) {
            return null;
        }

        $output = [];
        /** @var Model\ModelInterface $model */
        foreach ($value as $model) {
            $output[] = $model->toArray();
        }

        return $output;
    }
}
