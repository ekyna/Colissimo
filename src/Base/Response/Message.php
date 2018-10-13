<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Response;

/**
 * Class Message
 * @package Ekyna\Component\Colissimo\Base\Response
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Message
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $content;

    /**
     * Constructor.
     *
     * @param int    $id
     * @param string $type
     * @param string $content
     */
    public function __construct(int $id, string $type, string $content)
    {
        $this->id = $id;
        $this->type = $type;
        $this->content = $content;
    }

    /**
     * Returns the id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}
