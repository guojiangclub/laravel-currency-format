###laravel-currency-format

Laravel 贴合实际需求同时方便扩展的数字，金额格式化组件

基于业务需求，需要把数字，金额格式化以方便前端展示，`laravel Eloquent`官方提供了修改器，如将以`分`为单位的`amount`字段换算成`元`：

```php
public function getAmountAttribute()
{
	return number_format($this->value, 2, '.', '');
}
```

### Featrue

1. 自定义需要转换的字段
2. `Trait`即引即用
3. `FormatContract`方便扩展开发
4. 支持`toArray`数组化

### 安装

> ```php
> composer require ibrand/laravel-currency-format
> ```

### 使用

1. 定义`Eloquent Model`模型
2. 引用 格式化`Trait`模型： `use iBrand\Currency\Format\HasFormatAttributesTrait` 
3. 自定义格式化字段：`protected $format_attributes`

> 就是这么简单

```php
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

use iBrand\Currency\Format\HasFormatAttributesTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFormatAttributesTrait;//引用格式化Trait

    protected $guarded = ['id'];

    protected $format_attributes = ['total', 'items_total'];//自定义需要格式化的字段，就是这么简单

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
      
      	$this->setTable(config('ibrand.app.database.prefix', 'ibrand_').'order');
    }
}
```

> 如访问`格式化total`属性，`$order->display_total`即可。
