<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class Address
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $companyName
 * @property string $lastName
 * @property string $firstName
 * @property string $line0
 * @property string $line1
 * @property string $line2
 * @property string $line3
 * @property string $countryCode
 * @property string $city
 * @property string $zipCode
 * @property string $phoneNumber
 * @property string $mobileNumber
 * @property string $doorCode1
 * @property string $doorCode2
 * @property string $email
 * @property string $intercom
 * @property string $language
 */
class Address extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\AlphaNumeric('companyName', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('lastName', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('firstName', false, 29))
            ->addField(new Base\Definition\AlphaNumeric('line0', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('line1', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('line2', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('line3', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('countryCode', false, 2))
            ->addField(new Base\Definition\AlphaNumeric('city', false, 35))
            ->addField(new Base\Definition\AlphaNumeric('zipCode', false, 8))
            ->addField(new Base\Definition\AlphaNumeric('phoneNumber', false, 12))
            ->addField(new Base\Definition\AlphaNumeric('mobileNumber', false, 12))
            ->addField(new Base\Definition\AlphaNumeric('doorCode1', false, 8))
            ->addField(new Base\Definition\AlphaNumeric('doorCode2', false, 8))
            ->addField(new Base\Definition\AlphaNumeric('email', false, 80))
            ->addField(new Base\Definition\AlphaNumeric('intercom', false, 30))
            ->addField(new Base\Definition\AlphaNumeric('language', false, 2));
    }
}
