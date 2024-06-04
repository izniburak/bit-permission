<?php

use Buki\BitPermission\Sequent;
use Buki\Tests\Classes\Role;
use Buki\Tests\Classes\RoleEnum;

test('check class instance', function () {
    $role = new Sequent;

    expect($role)->toBeInstanceOf(Sequent::class);
});

test('add a role', function () {
    $role = new Sequent;
    $role->add(Role::USER);

    expect($role->has(Role::USER))->toBeBool();
});

test('add & check multiple roles', function () {
    $role = new Sequent;
    $role->add(Role::USER)->add(Role::AUTHOR);

    $this->assertTrue($role->has(ROLE::USER, ROLE::AUTHOR));
});

test('add & check multiple roles with array', function () {
    $role = new Sequent;
    $role->add([Role::USER, Role::AUTHOR]);

    $this->assertTrue($role->has(ROLE::USER, ROLE::AUTHOR));
    $this->assertTrue($role->has([ROLE::USER, ROLE::AUTHOR]));
});

test('check all roles', function () {
    $role = new Sequent;
    $role->add(Role::EDITOR)->add(Role::AUTHOR);

    $this->assertTrue($role->hasAll(ROLE::EDITOR, ROLE::AUTHOR));
    $this->assertNotTrue($role->hasAll(ROLE::EDITOR, ROLE::ADMIN));
});

test('add only one role', function () {
    $role = new Sequent;
    $role->add(Role::USER, Role::AUTHOR);
    $role->only(Role::EDITOR);

    $this->assertTrue($role->has(ROLE::EDITOR));
    $this->assertNotTrue($role->has(ROLE::AUTHOR));
});

test('remove a role', function () {
    $role = new Sequent;
    $role->add(Role::AUTHOR)->add(Role::EDITOR);
    $role->remove(Role::AUTHOR);

    $this->assertTrue($role->has(Role::EDITOR));
    $this->assertNotTrue($role->has(Role::AUTHOR));
});

test('check out of bound value', function () {
    $role = new Sequent;
    $role->add(PHP_INT_SIZE * 8); // 64 can be constant value in the class.

    $role->has(PHP_INT_SIZE * 8);
})->throws(OutOfBoundsException::class);

test('add a role by using Enum', function () {
    $role = new Sequent;
    $role->add(RoleEnum::USER);

    expect($role->has(RoleEnum::USER))->toBeBool();
});

test('add & check multiple roles by using Enum', function () {
    $role = new Sequent;
    $role->add(RoleEnum::USER)->add(RoleEnum::AUTHOR);

    $this->assertTrue($role->has(RoleEnum::USER, RoleEnum::AUTHOR));
});


