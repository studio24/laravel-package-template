# PHP Package Template

A repository template for Studio 24's open source Laravel packages.

## How to use this template

This package can be used as to scaffold a PHP package. Follow these steps to get started:

1. Press the "Use template" button at the top of this repo to create a new repo with the contents of this skeleton
2. Run `php ./configure.php` to run a script that will replace all placeholders throughout all the files
3. Have fun creating your package.

## Components

A brief explanation of the different components of this package template.

- `.github/ISSUE_TEMPLATE` - GitHub issue templates
- `.github/workflows` - GitHub actions for running tests (php.yml) and automated releases (release.yml)
- `.github/dependabot.yml` - Dependabot configuration
- `config` - Config file for your Laravel package
- `database` - Laravel database files (factories and migrations)
- `resources` - Laravel resources (templates)
- `src/` - The PHP source code for your Laravel package, this will autoload based on the autoload rules in composer.json
- `src/Commands` - Laravel artisan command
- `src/Facades` - Laravel facades
- `src/ExampleClass.php` - An example class
- `src/PackageTemplateServiceProvider.php` - Service Provider for your Laravel package
- `tests` - PHPUnit tests for your package
- `.editorconfig` - Your [editor coding style](https://editorconfig.org/) configuration
- `.gitattributes` - Ignore these files/folders when this package is installed via Composer
- `.phpcs.xml.dist` - [PHPCodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer/) configuration
- `.phplint.yml` - [PHPLint](https://github.com/overtrue/phplint) configuration
- `CHANGELOG.md` - A list of notable changes, the contents of this file are automated by automated releases
- `CODE_OF_CONDUCT.md` - Contributor's code of conduct
- `composer.json` - Composer PHP package dependencies
- `configure.php` - Package configuration script, this file is deleted after configure.php is run
- `CONTRIBUTING.md` - Guide to contributing
- `LICENSE.md` - License information
- `phpstan.neon` - [PHPStan](https://phpstan.org/) configuration
- `phpunit.xml.dist` - [PHPUnit](https://phpunit.de/) configuration
- `README.md` - This README file, this file is deleted once configure.php is run
- `README_DEFAULT.md` - The default README file for your new package, this file is copied to README.md after configure.php is run
- `SECURITY.md` - Security policy for this package

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Thanks to
* [Spatie Laravel Package Skeleton](https://github.com/spatie/package-skeleton-laravel) 
