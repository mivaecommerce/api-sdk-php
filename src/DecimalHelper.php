<?php

namespace MerchantAPI;

class DecimalHelper
{
    /** @var bool|null */
    protected static ?bool $hasDecimal = null;

    /** @var bool */
    public static bool $useDecimal = true;

    /**
     * @return bool Checks to see if the current php install
     *              supports high precision using the decimal
     *              extension.
     */
    public static function hasDecimal() : bool
    {
        if (static::$hasDecimal === null) {
            static::$hasDecimal = class_exists('\Decimal\Decimal');
        }

        return static::$hasDecimal;
    }

    /**
     * Creates a Decimal instance if supported, otherwise returns value
     * @param float|int|string|Decimal $value
     * @return \Decimal\Decimal|float|string
     * @throws UnexpectedValueException
     */
    public static function create($value, int $precision = 10)
    {
        if (is_null($value)) {
            return null;
        }

        if (static::hasDecimal()) {
            if ($value instanceof \Decimal\Decimal) {
                return $value;
            }

            if (static::$useDecimal) {
                if (!is_numeric($value)) {
                    throw new \UnexpectedValueException('Expected float, int, numeric string, or instance of Decimal');
                }

                if (is_float($value)) {
                    return new \Decimal\Decimal(json_encode($value, JSON_PRESERVE_ZERO_FRACTION), $precision);
                } else if (is_int($value)) {
                    return new \Decimal\Decimal(sprintf('%d', $value), $precision);
                }

                return new \Decimal\Decimal($value, $precision);
            }
        }

        if (!is_numeric($value)) {
            throw new \UnexpectedValueException('Expected float, int, numeric string, or instance of Decimal');
        }

        return is_int($value) ? (float) $value : $value;
    }

    /**
     * Serialize a float field value. Handles the following types:
     *          float, int, string, Decimal
     * @param $value
     * @param int $scale
     * @return float|string|Decimal
     * @throws UnexpectedValueException
     */
    public static function serialize($value, int $scale = 2)
    {
        if (static::isDecimal($value)) {
            return $value->toFixed($scale);
        } else if(is_numeric($value)) {
            return (float) $value;
        } else if (is_string($value)) {
            return $value;
        }

        throw new \UnexpectedValueException('Expected float, int, string, or instance of Decimal');
    }

    /**
     * Checks a given value to see if it is a high precision Decimal instance
     * @param mixed $value
     * @return bool
     */
    public static function isDecimal($value) : bool
    {
        if (!static::hasDecimal()) {
            return false;
        }

        return ($value instanceof \Decimal\Decimal);
    }
}
