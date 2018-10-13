<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Enum;

use Ekyna\Component\Colissimo\Base\Enum\AbstractEnum;

/**
 * Class RreturnTypeChoice
 * @package Ekyna\Component\Colissimo\Enum
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class ReturnTypeChoice extends AbstractEnum
{
    const RETURN_TO_SENDER = '2';
    const DO_NOT_RETURN    = '3';
}
