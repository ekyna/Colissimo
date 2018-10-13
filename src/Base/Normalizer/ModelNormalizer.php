<?php

namespace Ekyna\Component\Colissimo\Base\Normalizer;

use Ekyna\Component\Colissimo\Base\Definition\Definition;
use Ekyna\Component\Colissimo\Base\Model\ModelInterface;
use Ekyna\Component\Colissimo\Base\Response\Message;
use Ekyna\Component\Colissimo\Base\Response\ResponseInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 * Class ModelNormalizer
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class ModelNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    use SerializerAwareTrait;

    /**
     * @inheritDoc
     *
     * @param ModelInterface $object
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $normalized = [];
        foreach ($object->getDefinition()->getFields() as $field) {
            if (isset($object->{$key = $field->getName()})) {
                if ($field instanceof SerializerAwareInterface) {
                    $field->setSerializer($this->serializer);
                }

                $normalized[$key] = $field->normalize($object->{$key}, $format, $context);
            }
        }

        return $normalized;
    }

    /**
     * @inheritDoc
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (empty($data)) {
            return null;
        }

        $denormalized = new $class;

        /** @var Definition $definition */
        $definition = call_user_func([$class, 'getDefinition']);

        foreach ($definition->getFields() as $name => $field) {
            if (isset($data[$name])) {
                if ($field instanceof SerializerAwareInterface) {
                    $field->setSerializer($this->serializer);
                }

                $denormalized->{$name} = $field->denormalize($data[$name], '', $format, $context);
            }
        }

        // Response messages
        if ($denormalized instanceof ResponseInterface && isset($data['messages'])) {
            foreach ($data['messages'] as $m) {
                $message = new Message(intval($m['id']), $m['type'], $m['messageContent']);
                $denormalized->addMessage($message);
            }
        }

        return $denormalized;
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof ModelInterface;
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return !empty($data) && is_subclass_of($type, ModelInterface::class);
    }
}
