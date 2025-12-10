<?php
declare(strict_types=1);

namespace VendorName\PackageTemplate\Facades;

use Illuminate\Support\Facades\Facade;

class PackageTemplate extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \VendorName\PackageTemplate\ExampleClass::class;
    }
}
