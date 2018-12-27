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

class RmbFormat implements FormatContract
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function toValue()
    {
        return number_format(round($this->value / 100, 2), 2, '.', '');
    }
}
