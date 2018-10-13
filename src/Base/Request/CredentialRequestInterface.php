<?php

namespace Ekyna\Component\Colissimo\Base\Request;

/**
 * Interface CredentialRequestInterface
 * @package Ekyna\Component\Colissimo\Request
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
interface CredentialRequestInterface extends RequestInterface
{
    /**
     * Sets the credentials.
     *
     * @param string $login
     * @param string $password
     *
     * @return mixed
     */
    public function setCredentials(string $login, string $password);
}
