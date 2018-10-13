<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Definition;

use Ekyna\Component\Colissimo\Base\Exception\DefinitionException;

/**
 * Class Definition
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Definition
{
    /**
     * @var FieldInterface[]
     */
    private $fields = [];


    /**
     * Returns whether a field is defined for the given name.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasField(string $name): bool
    {
        return isset($this->fields[$name]);
    }

    /**
     * Adds the field.
     *
     * @param FieldInterface $field
     *
     * @return $this|Definition
     */
    public function addField(FieldInterface $field): Definition
    {
        $name = $field->getName();

        if ($this->hasField($name)) {
            throw new DefinitionException("Field '$name' is already defined.");
        }

        $this->fields[$name] = $field;

        return $this;
    }

    /**
     * Returns the field for the given name.
     *
     * @param string $name
     *
     * @return FieldInterface
     */
    public function getField(string $name): FieldInterface
    {
        if (!$this->hasField($name)) {
            throw new DefinitionException("Field '$name' is not defined.");
        }

        return $this->fields[$name];
    }

    /**
     * Returns the fields.
     *
     * @return FieldInterface[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
