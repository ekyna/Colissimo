<?php

namespace Ekyna\Component\Colissimo\Base\Request;

use Ekyna\Component\Colissimo\Base\Definition;

/**
 * Class AbstractCredentialRequest
 * @package Ekyna\Component\Colissimo\Request
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $accountNumber
 * @property string $password
 */
abstract class AbstractCredentialRequest extends AbstractRequest implements CredentialRequestInterface
{
    /**
     * Adds the credentials fields.
     *
     * @param Definition\Definition $definition
     */
    public static function buildDefinition(Definition\Definition $definition): void
    {
        $definition
            ->addField(new Definition\AlphaNumeric('accountNumber', true, 6))
            ->addField(new Definition\AlphaNumeric('password', true, 15));
    }

    /**
     * @inheritDoc
     */
    public function setCredentials(string $login, string $password)
    {
        $this->accountNumber = $login;
        $this->password = $password;
    }
}
