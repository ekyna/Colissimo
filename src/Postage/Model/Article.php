<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class Article
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $description
 * @property int    $quantity
 * @property float  $weight
 * @property float  $value
 * @property int    $hsCode
 * @property string $originCountry
 * @property string $currency
 * @property string $artref
 * @property string $originalIdent
 */
class Article extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\AlphaNumeric('description', true, 64))
            ->addField(new Base\Definition\Numeric('quantity', true, 5))
            ->addField(new Base\Definition\Decimal('weight', true, 10, 3))
            ->addField(new Base\Definition\Decimal('value', true, 10, 2))
            ->addField(new Base\Definition\Numeric('hsCode', false, 10))
            ->addField(new Base\Definition\AlphaNumeric('originCountry', false, 2))
            ->addField(new Base\Definition\AlphaNumeric('currency', false, 3))
            ->addField(new Base\Definition\AlphaNumeric('artref', false, 44))
            ->addField(new Base\Definition\AlphaNumeric('originalIdent', false, 1));
    }

    /**
     * @inheritdoc
     */
    public function validate(string $prefix = null): void
    {
        parent::validate($prefix);

        // TODO See pages 24/25
    }
}
