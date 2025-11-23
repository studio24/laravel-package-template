# How to contribute

We welcome contributions to this package.

All contributors must agree to our [Code of Conduct](CODE_OF_CONDUCT.md). This package is released under the MIT license and is copyright [Studio 24 Ltd](https://www.studio24.net/). 

All contributors
must accept these license and copyright conditions.

## Pull Requests

All contributions must be made on a branch and must pass [unit tests](#tests) and [coding standards](#coding-standards).

Please create a Pull Request to merge changes into the `main` branch, these will be automatically tested by
GitHub Actions.

All Pull Requests need at least one approval from the Studio 24 development team.

## Release

We follow [semantic versioning](https://semver.org/). This can be summarised as:

* Major version when you make incompatible API changes (e.g. 2.0.0)
* Minor version when you add functionality in a backwards compatible manner (e.g. 2.1.0)
* Patch version when you make backwards compatible bug fixes (e.g. 2.1.1)

### Creating a release

This repo uses [Release Please](https://github.com/marketplace/actions/release-please-action) to automatically create releases, based on [semantic versioning](https://semver.org/).

To create a new release use [conventional commits](https://www.conventionalcommits.org/en/v1.0.0/) in your commit message. This will automatically create a release PR, which is kept up to date with further commits and you can merge it to create the new release when you are ready.

Use the following keywords in your commits:

* `fix:` this indicates a bug fix and creates a new patch version (e.g. 1.0.1).
* `feat:` this indicates a new feature and creates a new minor version (e.g. 1.1.0).
* To create a new major version (e.g. 2.0.0) either append an exclamation mark to `fix!:` or `feat!:` or add a foter of `BREAKING CHANGE:` with details of what breaking changes there are.

This will create a PR with the name `chore(main): release [version]`, this allows you to check what is about to be
included in the release and make any manual edits to the [CHANGELOG.md](CHANGELOG.md)

If the action fails to run you can view the action and select `Re-run all jobs` to re-run it.

Once a release PR is merged in this will automatically create a new release at [Packagist](https://packagist.org)
so code can be loaded via Composer.

## Unit tests

Please add unit tests for all bug fixes and new code changes.

Run [PHPUnit](https://phpunit.readthedocs.io/en/8.0/) tests via:

```
composer test
```

## PHPStan

You can use [PHPStan](https://phpstan.org/) to help test code quality, this can help catch simple errors:

```
composer phpstan
```

## Coding standards

This package follows the [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standard. You can check this with:

```
composer cs
```

Where possible, you can auto-fix code via:

```
composer format
```

Please ensure you declare strict types at the top of each PHP file:

```php
declare(strict_types=1);
```
