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

use iBrand\Currency\Format\Test\BaseTest;
use iBrand\Currency\Format\Test\Order;

class HasAttributesTraitTest extends BaseTest
{
    public function testFormat()
    {
        $order = Order::find(1);
        $this->assertEquals(11500, $order->total);
        $this->assertEquals(115, $order->display_total);
        $this->assertEquals(2000, $order->adjustment_total);

        $array = $order->toArray();

        $this->assertEquals(11500, $array['total']);
        $this->assertEquals(115, $array['display_total']);
    }
}
