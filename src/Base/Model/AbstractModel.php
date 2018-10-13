<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Model;

use Ekyna\Component\Colissimo\Base\Definition\Definition;

/**
 * Class AbstractModel
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
abstract class AbstractModel implements ModelInterface
{
    /**
     * @var Definition[]
     */
    private static $definitions = [];

    /**
     * @var array
     */
    private $data = [];


    /**
     * @inheritdoc
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            $field = $this->getDefinition()->getField($name);
            if ($field instanceof \Ekyna\Component\Colissimo\Base\Definition\Model) {
                $class = $field->getClass();

                return $this->data[$name] = new $class;
            } elseif ($field instanceof \Ekyna\Component\Colissimo\Base\Definition\ArrayOfModel) {
                return $this->data[$name] = new Collection($field->getClass());
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @inheritdoc
     */
    public function __isset($name)
    {
        return array_key_exists($name, $this->data);
    }

    /**
     * @inheritdoc
     */
    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    /**
     * @inheritdoc
     */
    public static function getDefinition(): Definition
    {
        if (isset(self::$definitions[static::class])) {
            return self::$definitions[static::class];
        }

        $definition = new Definition();

        static::buildDefinition($definition);

        return self::$definitions[static::class] = $definition;
    }

    /**
     * @inheritdoc
     */
    public function validate(string $prefix = null): void
    {
        $fields = $this->getDefinition()->getFields();

        foreach ($fields as $name => $field) {
            $value = isset($this->{$name}) ? $this->{$name} : null;

            $field->validate($value, $prefix);
        }
    }

    /**
     * @inheritdoc
     */
    public function toArray(): array
    {
        $data = [];

        $definition = $this->getDefinition();

        foreach ($definition->getFields() as $name => $field) {
            $value = isset($this->{$name}) ? $this->{$name} : null;

            if (!is_null($value)) {
                $data[$name] = $field->toArray($value);
            }
        }

        return $data;
    }

    /**
     * Builds the definition.
     *
     * @param Definition $definition
     */
    public static function buildDefinition(Definition $definition): void
    {

    }
}
