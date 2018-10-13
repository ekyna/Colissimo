<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class Letter
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property Service             $service
 * @property Parcel              $parcel
 * @property LetterSender        $sender
 * @property Addressee           $addressee
 * @property CustomsDeclarations $customsDeclarations
 */
class Letter extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Model('service', true, Service::class))
            ->addField(new Base\Definition\Model('parcel', true, Parcel::class))
            ->addField(new Base\Definition\Model('sender', false, LetterSender::class))
            ->addField(new Base\Definition\Model('addressee', true, Addressee::class))
            ->addField(new Base\Definition\Model('customsDeclarations', false, CustomsDeclarations::class));
    }
}
