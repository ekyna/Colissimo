<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Response;

use Ekyna\Component\Colissimo\Base\Model\ModelInterface;

/**
 * Interface ResponseInterface
 * @package Ekyna\Component\Colissimo\Response
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
interface ResponseInterface extends ModelInterface
{
    /**
     * Sets whether the response succeed.
     *
     * @param bool $success
     *
     * @return AbstractResponse
     */
    public function setSuccess(bool $success): ResponseInterface;

    /**
     * Returns whether the response succeed.
     *
     * @return bool
     */
    public function isSuccess();

    /**
     * Adds the message.
     *
     * @param Message $message
     *
     * @return $this
     */
    public function addMessage(Message $message): ResponseInterface;

    /**
     * Returns the messages.
     *
     * @return Message[]
     */
    public function getMessages();
    
    /**
     * Adds the attachment.
     *
     * @param Attachment $attachment
     *
     * @return $this
     */
    public function addAttachment(Attachment $attachment): ResponseInterface;

    /**
     * Returns the attachments.
     *
     * @return Attachment[]
     */
    public function getAttachments();
}