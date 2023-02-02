<?php

declare(strict_types=1);

use App\Contracts\Commands\Requests\UpdateRequestContract;
use App\Http\DataObject\NewRequest;
use App\Models\Request;

it('can update a request', function (string $string): void {
    $request = Request::factory()->create(['description' => 'test']);

    /**
     * @var UpdateRequestContract $command
     */
    $command = app()->make(
        abstract: UpdateRequestContract::class,
    );


    $command->handle(
        payload: new NewRequest(
            name: $string,
            status: $request->getAttribute('status'),
            description: $request->getAttribute('description'),
        ),
        id: $request->getKey(),
    );

    expect(
        $request->refresh()
    )->name->toEqual($string)->description->toEqual('test');
})->with('strings');
