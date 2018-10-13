<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Enum;

use Ekyna\Component\Colissimo\Base\Enum\AbstractEnum;
use Ekyna\Component\Colissimo\Base\Exception\InvalidArgumentException;

/**
 * Class ProductCode
 * @package Ekyna\Component\Colissimo\Enum
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class ProductCode extends AbstractEnum
{
    // FRANCE
    const DOM  = 'DOM';
    const COLD = 'COLD';
    const DOS  = 'DOS';
    const COL  = 'COL';
    const BPR  = 'BPR';
    const A2P  = 'A2P';
    const CORE = 'CORE';
    const COLR = 'COLR';
    const JP1  = 'J+1';

    // International
    const CORI = 'CORI';
    const COM  = 'COM';
    const CDS  = 'CDS';
    const ECO  = 'ECO';
    const ACP  = 'ACP';
    const COLI = 'COLI';
    const ACCI = 'ACCI';
    const CMT  = 'CMT';
    const PCS  = 'PCS';
    const BDP  = 'BDP';
    const CDI  = 'CDI';
    const BOS  = 'BOS';
    const BOM  = 'BOM';

    private const WS_MAP = [
        '6A'  => 'DOM',
        '9L'  => 'COLD',
        '6C'  => 'DOS',
        '9V'  => 'COL',
        '6H'  => 'BPR',
        '6M'  => 'A2P',
        '8R'  => 'CORE',
        '6G'  => 'COLR',
        '6V'  => 'J+1',
        '7R'  => 'CORI',
        '8Q'  => 'COM',
        '7Q'  => 'CDS',
        '9W'  => 'ECO',
        '5R'  => 'CORI',
        'CP'  => 'COLI',
        'EY'  => 'COLI',
        'EN'  => 'ACCI',
        'CM'  => 'CMT',
        'CG'  => 'PCG',
        'CA'  => 'DOM',
        'CB'  => 'DOS',
        'BDP' => 'CI',
    ];

    /**
     * Returns whether the given product code is valid for the given country code.
     *
     * @param string $product
     * @param string $country
     *
     * @return bool
     */
    public static function isValidForCountry($product, $country): bool
    {
        // TODO See page 37

        return true;
    }

    /**
     * @inheritDoc
     */
    public static function denormalize(string $data): string
    {
        if (!isset(static::WS_MAP[$data])) {
            throw new InvalidArgumentException("Unexpected product code '$data'.");
        }

        return static::WS_MAP[$data];
    }
}
