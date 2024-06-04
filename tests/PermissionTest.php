<?php

use Buki\BitPermission\Binary;
use Buki\Tests\Classes\Permission;
use Buki\Tests\Classes\PermissionEnum;

test('check class instance', function () {
    $permission = new Binary;
    expect($permission)->toBeInstanceOf(Binary::class);
});

test('add a permission', function () {
    $permission = new Binary;
    $permission->add(Permission::READ);
    expect($permission->has(Permission::READ))->toBeBool();
});

test('add & check multiple permission', function () {
    $permission = new Binary;
    $permission->add(Permission::READ, Permission::WRITE);

    $this->assertTrue($permission->has(Permission::READ, Permission::WRITE));
});

test('add & check multiple permission with array', function () {
    $permission = new Binary;
    $permission->add([Permission::READ, Permission::WRITE]);

    $this->assertTrue($permission->has(Permission::READ, Permission::WRITE));
    $this->assertTrue($permission->has([Permission::READ, Permission::WRITE]));
});

test('check all permissions', function () {
    $permission = new Binary;
    $permission->add(Permission::READ, Permission::WRITE);

    $this->assertTrue($permission->hasAll(Permission::READ, Permission::WRITE));
    $this->assertNotTrue($permission->hasAll(Permission::READ, Permission::UPDATE));
});

test('add only one permission', function () {
    $permission = new Binary;
    $permission->add(Permission::READ, Permission::WRITE);
    $permission->only(Permission::DELETE);

    $this->assertTrue($permission->has(Permission::DELETE));
    $this->assertNotTrue($permission->has(Permission::WRITE));
});

test('add super permission and check', function () {
    $permission = new Binary;
    $permission->add(Permission::SUPER);

    $this->assertTrue($permission->has(Permission::READ));
    $this->assertTrue($permission->has(Permission::WRITE));
    $this->assertTrue($permission->has(Permission::UPDATE));
    $this->assertTrue($permission->has(Permission::DELETE));
});

test('remove a permission', function () {
    $permission = new Binary;
    $permission->add(Permission::READ)->add(Permission::WRITE);
    $permission->remove(Permission::READ);

    $this->assertTrue($permission->has(Permission::WRITE));
    $this->assertNotTrue($permission->has(Permission::READ));
});

test('check out of bound value', function () {
    $permission = new Binary;
    $value = PHP_INT_MAX + 1;
    $permission->add($value); // $value can be constant value in the class.
    $permission->has($value);
})->throws(Error::class);

test('add & check multiple permission by using Enums', function () {
    $permission = new Binary;
    $permission->add(PermissionEnum::READ, PermissionEnum::WRITE);

    $this->assertTrue($permission->has(PermissionEnum::READ, PermissionEnum::WRITE));
});
