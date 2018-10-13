<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class CustomsDeclarations
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property bool     $includeCustomsDeclarations
 * @property Contents $contents
 * @property string   $importersReference
 * @property string   $flowTransport
 * @property string   $importersContact
 * @property string   $officeOrigin
 * @property string   $comments
 * @property string   $invoiceNumber
 * @property string   $licenceNumber
 * @property string   $certificatNumber
 * @property Address  importerAddress
 */
class CustomsDeclarations extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Boolean('includeCustomsDeclarations', false))
            ->addField(new Base\Definition\Model('contents', false, Contents::class))
            ->addField(new Base\Definition\AlphaNumeric('importersReference', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('flowTransport', false, 6))// TODO ?
            ->addField(new Base\Definition\AlphaNumeric('importersContact', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('officeOrigin', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('comments', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('invoiceNumber', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('licenceNumber', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('certificatNumber', false, 35))
            ->addField(new Base\Definition\Model('importerAddress', false, Address::class));
    }
}
