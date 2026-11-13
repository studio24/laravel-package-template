<?php

declare(strict_types=1);

namespace VendorName\PackageTemplate\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use VendorName\PackageTemplate\ExampleClass;
use VendorName\PackageTemplate\PackageTemplateServiceProvider;

/** @see https://docs.phpunit.de/en/12.4/writing-tests-for-phpunit.html */
class ExampleTest extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'VendorName\\PackageTemplate\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            PackageTemplateServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
         foreach (\Illuminate\Support\Facades\File::allFiles(__DIR__ . '/../database/migrations') as $migration) {
            (include $migration->getRealPath())->up();
         }
         */
    }

    public function test_it_can_instantiate_the_example_class(): void
    {
        $this->assertInstanceOf(ExampleClass::class, new ExampleClass());
    }
}
