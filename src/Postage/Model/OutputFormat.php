<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Postage\Enum;

/**
 * Class OutputFormat
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $outputPrintingType
 * @property string $returnType
 * @property int    $x
 * @property int    $y
 */
class OutputFormat extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Enum('outputPrintingType', true, false, Enum\OutputPrintingType::class))
            ->addField(new Base\Definition\Enum('returnType', false, false, Enum\ReturnType::class))
            ->addField(new Base\Definition\Numeric('x', false, 4))
            ->addField(new Base\Definition\Numeric('y', false, 4));
    }
}
