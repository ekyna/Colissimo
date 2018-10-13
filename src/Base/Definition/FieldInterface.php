<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Interface FieldInterface
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
interface FieldInterface extends NormalizerInterface, DenormalizerInterface
{
    /**
     * Returns the name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns whether the field required.
     *
     * @return bool
     */
    public function isRequired(): bool;

    /**
     * Returns whether the given value is empty.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isEmpty($value): bool;

    /**
     * Validates the given value.
     *
     * @param mixed  $value
     * @param string $prefix
     *
     * @throws \Ekyna\Component\Colissimo\Base\Exception\ValidationException
     */
    public function validate($value, string $prefix = null): void;

    /**
     * Formats the value for array.
     *
     * @param mixed $value
     *
     * @return mixed|null
     */
    public function toArray($value);
}
