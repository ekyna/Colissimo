<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Enum;

/**
 * Class AbstractEnum
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
abstract class AbstractEnum implements EnumInterface
{
    /**
     * @var array
     */
    private static $cache = [];


    /**
     * Returns the values.
     *
     * @return string[]
     */
    final public static function getValues(): array
    {
        if (isset(self::$cache[static::class])) {
            return self::$cache[static::class];
        }

        $rc = new \ReflectionClass(static::class);

        return self::$cache[static::class] = $rc->getConstants();
    }

    /**
     * Returns whether the given constant exists.
     *
     * @param string $constant
     *
     * @return bool
     */
    final public static function isValid($constant): bool
    {
        return in_array($constant, self::getValues(), true);
    }

    /**
     * Normalizes the constant.
     *
     * @param string $constant
     *
     * @return mixed
     */
    public static function normalize(string $constant): string
    {
        return $constant;
    }

    /**
     * Denormalizes the constant.
     *
     * @param string $value
     *
     * @return string
     */
    public static function denormalize(string $value): string
    {
        return $value;
    }

    /**
     * Disabled constructor.
     */
    final private function __construct()
    {
    }
}
