<?php

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class LabelResponse
 * @package Ekyna\Component\Colissimo\Postage\Model
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $parcelNumber
 * @property string $parcelNumberPartner
 * @property string $pdfUrl
 */
class LabelResponse extends Base\Model\AbstractModel
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\AlphaNumeric('parcelNumber', true, 32))
            ->addField(new Base\Definition\AlphaNumeric('parcelNumberPartner', false, 64))
            ->addField(new Base\Definition\AlphaNumeric('pdfUrl', false, 255))
            ->addField(new Base\Definition\Fields(false));
    }
}
