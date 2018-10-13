<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Model;

use Ekyna\Component\Colissimo\Base\Definition\AlphaNumeric;
use Ekyna\Component\Colissimo\Base\Definition\Definition;

/**
 * Class Field
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $key
 * @property string $value
 */
class Field extends AbstractModel
{
    /**
     * Constructor.
     *
     * @param string $key
     * @param string $value
     */
    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public static function buildDefinition(Definition $definition): void
    {
        $definition
            ->addField(new AlphaNumeric('key', true, 32))
            ->addField(new AlphaNumeric('value', true, 32));
    }
}
