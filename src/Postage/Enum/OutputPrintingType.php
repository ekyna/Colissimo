<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Enum;

use Ekyna\Component\Colissimo\Base\Enum\AbstractEnum;

/**
 * Class OutputPrintingType
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class OutputPrintingType extends AbstractEnum
{
    const ZPL_10x15_203dpi = 'ZPL_10x15_203dpi';
    const ZPL_10x15_300dpi = 'ZPL_10x15_300dpi';
    const DPL_10x15_203dpi = 'DPL_10x15_203dpi';
    const DPL_10x15_300dpi = 'DPL_10x15_300dpi';
    const PDF_10x15_300dpi = 'PDF_10x15_300dpi';
    const PDF_A4_300dpi    = 'PDF_A4_300dpi';
}
