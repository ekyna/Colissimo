<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Enum;

/**
 * Interface EnumInterface
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
interface EnumInterface
{
    /**
     * Returns the values.
     *
     * @return array
     */
    public static function getValues(): array;

    /**
     * Returns whether the given constant exists.
     *
     * @param string $constant
     *
     * @return bool
     */
    public static function isValid($constant): bool;
}