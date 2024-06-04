## PHP Bit Permission Check 
#### Check something like Permission, Roles, etc.. by using bitwise operations. 
```
  _     _ _                                    _         _             
| |   (_) |                                  (_)       (_)            
| |__  _| |_ ______ _ __   ___ _ __ _ __ ___  _ ___ ___ _  ___  _ __  
| '_ \| | __|______| '_ \ / _ \ '__| '_ ` _ \| / __/ __| |/ _ \| '_ \ 
| |_) | | |_       | |_) |  __/ |  | | | | | | \__ \__ \ | (_) | | | |
|_.__/|_|\__|      | .__/ \___|_|  |_| |_| |_|_|___/___/_|\___/|_| |_|
                   | |                                                
                   |_|
```

![Tests](https://github.com/izniburak/bit-permission/actions/workflows/run-tests.yml/badge.svg)
[![Total Downloads](https://poser.pugx.org/izniburak/bit-permission/d/total.svg)](https://packagist.org/packages/izniburak/bit-permission)
[![Latest Stable Version](https://poser.pugx.org/izniburak/bit-permission/v/stable.svg)](https://packagist.org/packages/izniburak/bit-permission)
[![Latest Unstable Version](https://poser.pugx.org/izniburak/bit-permission/v/unstable.svg)](https://packagist.org/packages/izniburak/bit-permission)
[![License](https://poser.pugx.org/izniburak/bit-permission/license.svg)](https://packagist.org/packages/izniburak/bit-permission)



## Install

composer.json file:
```json
{
    "require": {
        "izniburak/bit-permission": "^1.0"
    }
}
```
after run the install command.
```
$ composer install
```

OR run the following command directly.

```
$ composer require izniburak/bit-permission
```

## Example Usage
```php
require 'vendor/autoload.php';

use Buki\BitPermission\Binary;
use Buki\BitPermission\Sequent;

// FOR ROLE MANAGEMENT
class Role
{
    const GUEST = 0;
    const USER = 1;
    const EDITOR = 2;
    const AUTHOR = 3;
    const ADMIN = 4;
    const ROOT = 5;
}

$role = new Sequent;
$role->add([Role::USER, Role::AUTHOR]);

$role->has(ROLE::USER); // true
$role->has(ROLE::AUTHOR); // true
$role->has(ROLE::EDITOR); // false

// FOR PERMISSION MANAGEMENT
class Permission
{
    // Each permission is represented by a single bit.
    const NONE = 0x0000; // 0000
    const READ = 0x0001; // 0001
    const WRITE = 0x0002; // 0010
    const UPDATE = 0x0004; // 0100
    const DELETE = 0x0008; // 1000
    const SUPER = 0x000f; // 1111
}

$permission = new Binary;
$permission->add([Permission::READ, Permission::WRITE]);

$permission->has(Permission::READ); // true
$permission->has(Permission::DELETE); // false
```
Also, you can use `Enum` for your permission or role definitions. _(or another things)_\
Please check out the [tests](https://github.com/izniburak/bit-permission/tree/main/tests) to review more use cases.

## Support
[izniburak's homepage][author-url]

[izniburak's twitter][twitter-url]

## Licence
[MIT Licence][mit-url]

## Contributing

1. Fork it ( https://github.com/izniburak/bit-permission/fork )
2. Create your feature branch (git checkout -b my-new-feature)
3. Commit your changes (git commit -am 'Add some feature')
4. Push to the branch (git push origin my-new-feature)
5. Create a new Pull Request

## Contributors

- [izniburak](https://github.com/izniburak) İzni Burak Demirtaş - creator, maintainer

[mit-url]: http://opensource.org/licenses/MIT
[author-url]: https://buki.dev
[twitter-url]: https://twitter.com/izniburak
