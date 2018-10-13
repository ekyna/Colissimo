<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class Sender
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $line0
 * @property string $line1
 * @property string $line2
 * @property string $line3
 * @property string $countryCode
 * @property string $zipCode
 * @property string $city
 */
class MailBoxSender extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\AlphaNumeric('line0', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('line1', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('line2', true, 35))
            ->addField(new Base\Definition\AlphaNumeric('line3', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('countryCode', true, 2))
            ->addField(new Base\Definition\AlphaNumeric('zipCode', true, 5))
            ->addField(new Base\Definition\AlphaNumeric('city', false, 35));
    }
}
