<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Request;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Postage;

/**
 * Class GenerateLabelRequest
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property Postage\Model\OutputFormat $outputFormat
 * @property Postage\Model\Letter       $letter
 * @property Base\Model\Field[]         $fields
 */
class GenerateLabelRequest extends AbstractCredentialRequest
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        AbstractCredentialRequest::buildDefinition($definition);

        $definition
            ->addField(new Base\Definition\Model('outputFormat', true, Postage\Model\OutputFormat::class))
            ->addField(new Base\Definition\Model('letter', true, Postage\Model\Letter::class))
            ->addField(new Base\Definition\Fields(false));
    }
}
