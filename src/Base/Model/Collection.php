<?php

namespace Ekyna\Component\Colissimo\Base\Model;

/**
 * Class Collection
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Collection implements \ArrayAccess, \Iterator
{
    /**
     * @var string
     */
    private $class;

    /**
     * @var ModelInterface[]
     */
    private $models;

    /**
     * @var int
     */
    private $index = 0;


    /**
     * Constructor.
     *
     * @param string $class
     */
    public function __construct(string $class)
    {
        $this->class = $class;
        $this->models = [];
    }

    /**
     * @param ModelInterface $model
     */
    public function add(ModelInterface $model)
    {
        $this->models[] = $model;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->models[$this->index];
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        ++$this->index;
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->index;
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return isset($this->models[$this->index]);
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->index = 0;
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return isset($this->models[$offset]);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}
