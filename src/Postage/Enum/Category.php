<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Enum;

use Ekyna\Component\Colissimo\Base\Enum\AbstractEnum;

/**
 * Class Category
 * @package Ekyna\Component\Colissimo\Enum
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Category extends AbstractEnum
{
    const GIFT              = 1;
    const COMMERCIAL_SAMPLE = 2;
    const COMMERCIAL        = 3;
    const DOCUMENT          = 4;
    const OTHER             = 5;
    const RETURN            = 6;
}
