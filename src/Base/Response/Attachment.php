<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Response;

/**
 * Class Attachment
 * @package Ekyna\Component\Colissimo\Base\Response
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Attachment
{
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
     * @param string $type
     * @param string $content
     */
    public function __construct(string $type, string $content)
    {
        $this->type = $type;
        $this->content = $content;
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
