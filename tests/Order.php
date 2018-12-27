<?php

/*
 * This file is part of ibrand/laravel-currency-formatter.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iBrand\Currency\Format\Test;

use iBrand\Currency\Format\HasFormatAttributesTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFormatAttributesTrait;

    protected $guarded = ['id'];

    protected $format_attributes = ['total', 'items_total'];

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('ibrand.app.database.prefix', 'ibrand_').'order');

        parent::__construct($attributes);
    }

    public function getAdjustmentTotalAttribute($value)
    {
        return $value;
    }
}
