<?php

namespace Ekyna\Component\Colissimo\Base\Definition;

/**
 * Class Time
 * @package Ekyna\Component\Colissimo\Definition
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Time extends AbstractField
{
    /**
     * @inheritdoc
     */
    public function validate($value, string $prefix = null): void
    {
        if (empty($value)) {
            if ($this->required) {
                $this->throwValidationException("Value is required", $prefix);
            }

            return;
        }

        if (!is_string($value) || empty($value)) {
            $this->throwValidationException("Expected string value", $prefix);
        }

        if (!preg_match('~^[0-9]{2}:[0-9]{2}$~', $value)) {
            $this->throwValidationException("Expected time string with format 'H:i'", $prefix);
        }
    }
}
