#!/usr/bin/env php
<?php

function ask(string $question, string $default = ''): string
{
    $answer = readline($question.($default ? " ({$default})" : null).': ');

    if (! $answer) {
        return $default;
    }

    return $answer;
}

function confirm(string $question, bool $default = false): bool
{
    $answer = ask($question.' ('.($default ? 'Y/n' : 'y/N').')');

    if (! $answer) {
        return $default;
    }

    return strtolower($answer) === 'y';
}

function writeln(string $line): void
{
    echo $line.PHP_EOL;
}

function run(string $command): string
{
    return trim((string) shell_exec($command) ?? '');
}

function slugify(string $subject): string
{
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $subject), '-'));
}

function title_case(string $subject): string
{
    return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $subject)));
}

function title_snake(string $subject, string $replace = '_'): string
{
    return str_replace(['-', '_'], $replace, $subject);
}

function replace_in_file(string $file, array $replacements): void
{
    $contents = file_get_contents($file);

    file_put_contents(
        $file,
        str_replace(
            array_keys($replacements),
            array_values($replacements),
            $contents
        )
    );
}

function removeReadmeParagraphs(string $file): void
{
    $contents = file_get_contents($file);

    file_put_contents(
        $file,
        preg_replace('/<!--delete-->.*<!--\/delete-->/s', '', $contents) ?: $contents
    );
}

function replaceForAllOtherOSes(): array
{
    return explode(PHP_EOL, run('grep -E -r -l -i "VendorName|PackageTemplate|ExampleClass|vendor_slug|package_name|package_slug|package_description" --exclude-dir=vendor ./* ./.github/* | grep -v ' . basename(__FILE__)));
}

$vendorNamespace = ask('Vendor namespace', 'Studio24');
$vendorSlug = ask('Vendor slug', strtolower($vendorNamespace));

$currentDirectory = getcwd();
$folderName = basename($currentDirectory);

$packageName = ask('Package name', $folderName);
$packageSlug = slugify($packageName);

$className = title_case($packageName);
$className = ask('Class name', $className);
$description = ask('Package description', "This is my package {$packageSlug}");

writeln('------');
writeln("Package    : {$vendorSlug}/{$packageSlug}");
writeln("Description: {$description}");
writeln("Namespace  : {$vendorNamespace}\\{$className}");
writeln("Class name : {$className}");
writeln('------');

writeln('This script will replace the above values in all relevant files in the project directory.');

if (! confirm('Modify files?', true)) {
    exit(1);
}

$files = replaceForAllOtherOSes();

foreach ($files as $file) {
    replace_in_file($file, [
        'VendorName' => $vendorNamespace,
        'PackageTemplate' => $className,
        'ExampleClass' => $className,
        ':vendor_slug' => $vendorSlug,
        ':package_name' => $packageName,
        ':package_slug' => $packageSlug,
        ':package_description' => $description,
        'migration_table_name' => title_snake($packageSlug),
    ]);

    if (str_contains($file, 'src/ExampleClass.php')) {
        rename($file, './src/' . $className . '.php');
    }
    if (str_contains($file, 'src/PackageTemplateServiceProvider.php')) {
        rename($file, './src/'.$className.'ServiceProvider.php');
    }
    if (str_contains($file, 'src/Facades/Skeleton.php')) {
        rename($file, './src/Facades/'.$className.'.php');
    }
    if (str_contains($file, 'src/Commands/SkeletonCommand.php')) {
        rename($file, './src/Commands/'.$className.'Command.php');
    }
    if (str_contains($file, 'database/migrations/create_skeleton_table.php.stub')) {
        rename($file, './database/migrations/create_'.title_snake($packageSlug).'_table.php.stub');
    }
    if (str_contains($file, 'config/skeleton.php')) {
        rename($file, './config/'.$packageSlug.'.php');
    }
}

unlink('README.md');
rename('README_DEFAULT.md', 'README.md');

confirm('Execute `composer install`?') && run('composer install');

confirm('Let this script delete itself?', true) && unlink(__FILE__);
