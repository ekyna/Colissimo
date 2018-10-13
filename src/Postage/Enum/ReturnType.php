<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Enum;

use Ekyna\Component\Colissimo\Base\Enum\AbstractEnum;

/**
 * Class ReturnType
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class ReturnType extends AbstractEnum
{
    const SendPDFByMail     = 'SendPDFByMail';
    const SendPDFLinkByMail = 'SendPDFLinkByMail';
}
