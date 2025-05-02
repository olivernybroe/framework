<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use function PHPStan\Testing\assertType;

enum TestEnum: string
{
    case Foo = 'foo';
}

$request = Request::create('/', 'GET', [
    'key' => 'test',
]);

assertType('TestEnum|null', $request->enum('key', TestEnum::class));

class Example extends Model
{

}

assertType('Illuminate\Routing\Route', $request->route());
assertType('object|string|null', $request->route('key'));
assertType('Example|null', $request->route(Example::class));
