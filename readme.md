# TestAssist

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This package contains some nifty helpers and assertions that are made with Laravel in mind. The majority of functions are found in other packages, tutorials or repositories and credit is given for each function.

## Installation

Via Composer

``` bash
$ composer require jeroen-g/testassist
```

## Usage

All helpers are designed as traits and organised in components focused on browser, console and filesystem tests. If you want to have all helpers, simply use the general Assistants that will include all others for you.

```php

use JeroenG\TestAssist\Assistants;

class MyTest {
    use Assistants;

    // ...
}
```

### Browser (Laravel Dusk)
#### ClearCookiesBetweenTests
`use JeroenG\TestAssist\Browser\ClearCookiesBetweenTests`

Using this trait will make sure that between each test the user is logged out and all (session) cookies are deleted.
The best way to use this is to alter your TestCase's `tearDown()`:
```php
use JeroenG\TestAssist\Browser\ClearCookiesBetweenTests;

protected function tearDown()
{
    parent::tearDown();
    $this->clearCookies();
}
```

### Console
#### OutputAssertions
`use JeroenG\TestAssist\Console\OutputAssertions`

Contains two functions: `seeInConsoleOutput($text)` and 'doNotSeeInConsoleOutput($text)` to check whether or not the (un)expected text appears in the console output.

### Filesystem
#### FabricateModels
`use JeroenG\TestAssist\Filesystem\FabricateModels`

Containts two functions as shortcuts to Laravel's factory method to create/make model instances.
The shortest use would be as follows:
```php
$member = $this->create(User::class);
```

#### ManageFilesystem
`use JeroenG\TestAssist\Filesystem\ManageFilesystem`

As the moment this trait has only the function `removeDir($path)` to nuke the directory and everything inside of it.

#### FileAssertions
`use JeroenG\TestAssist\Filesystem\FileAssertions`

There are several assertions present to work with the (non)existence of files and directories.
```php
function test_filesystem() {
    $this->assertFileExistsOnDisk($filename); // Optionally pass the storage disk (defualt: local)
    $this->assertFileNotExistsOnDisk($filename);
    $this->assertFileExistsInZip($zipPath, $filename);
    $this->assertFileDoesntExistsInZip($zipPath, $filename);
}
```
The underlying functions such as `pathExists()` are of course also available for use.

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Credits

- [JeroenG][link-author]
- [All Contributors][link-contributors]

## License

EUPL-1.1. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jeroen-g/testassist.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jeroen-g/testassist.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jeroen-g/testassist/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/jeroen-g/testassist
[link-downloads]: https://packagist.org/packages/jeroen-g/testassist
[link-travis]: https://travis-ci.org/jeroen-g/testassist
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/jeroen-g
[link-contributors]: ../../contributors]