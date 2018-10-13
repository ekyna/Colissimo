<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Model;

use Ekyna\Component\Colissimo\Base\Definition\Definition;

/**
 * Interface ModelInterface
 * @package Ekyna\Component\Colissimo\Model
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
interface ModelInterface
{
    /**
     * Returns the definition.
     *
     * @return Definition
     */
    public static function getDefinition(): Definition;

    /**
     * Validates the model.
     *
     * @param string $prefix
     *
     * @throws \Ekyna\Component\Colissimo\Base\Exception\ValidationException
     */
    public function validate(string $prefix = null): void;

    /**
     * Returns the array value.
     *
     * @return array
     */
    public function toArray(): array;
}
