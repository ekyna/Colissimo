<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Response;

use Ekyna\Component\Colissimo\Base\Model\AbstractModel;

/**
 * Class AbstractResponse
 * @package Ekyna\Component\Colissimo\Base\Response
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
abstract class AbstractResponse extends AbstractModel implements ResponseInterface
{
    /**
     * @var bool
     */
    private $success = false;

    /**
     * @var Message[]
     */
    private $messages = [];

    /**
     * @var Attachment[]
     */
    private $attachments = [];


    /**
     * Returns the success.
     *
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * Sets the success.
     *
     * @param bool $success
     *
     * @return AbstractResponse
     */
    public function setSuccess(bool $success): ResponseInterface
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addMessage(Message $message): ResponseInterface
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @inheritdoc
     */
    public function addAttachment(Attachment $attachment): ResponseInterface
    {
        $this->attachments[] = $attachment;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAttachments()
    {
        return $this->attachments;
    }
}
