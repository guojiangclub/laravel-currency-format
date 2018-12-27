<?php

/*
 * This file is part of ibrand/laravel-currency-formatter.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iBrand\Currency\Format;

trait HasFormatAttributesTrait
{
    protected $formatPrefix = 'display';

    public function getCurrencyFormatAttributes()
    {
        if (!property_exists($this, 'format_attributes') || !is_array($this->format_attributes)) {
            return [];
        }

        return $this->format_attributes;
    }

    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();
        foreach ($this->getCurrencyFormatAttributes() as $attribute) {
            if ($format = new RmbFormat($attributes[$attribute])) {
                $attribute = $this->getFormatAttributeName($attribute);
                $attributes[$attribute] = $format->toValue();
            }
        }

        return $attributes;
    }

    public function getAttribute($attribute)
    {
        if ($this->hasGetMutator($attribute)) {
            return parent::getAttribute($attribute);
        }

        if (starts_with($attribute, $this->formatPrefix)) {
            $format = new RmbFormat(parent::getAttribute(substr($attribute, strlen($this->formatPrefix) + 1)));

            return $format->toValue();
        }

        return parent::getAttribute($attribute);
    }

    public function getFormatAttributeName($attribute)
    {
        return $this->formatPrefix.'_'.$attribute;
    }
}
