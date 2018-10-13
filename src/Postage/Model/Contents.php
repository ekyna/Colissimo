<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class Contents
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property Base\Model\Collection|Article[] $article
 * @property Category                        $category
 * @property Original                        $original
 */
class Contents extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\ArrayOfModel('article', true, Article::class))
            ->addField(new Base\Definition\Model('category', true, Category::class))
            ->addField(new Base\Definition\Model('original', false, Original::class));
    }
}
