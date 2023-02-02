<?php

declare(strict_types=1);

use App\Contracts\Commands\Requests\CreateRequestContract;
use App\Enums\Status;
use App\Http\DataObject\NewRequest;
use App\Models\Request;
use App\Models\User;

it('can create a new request', function (string $string): void {
    /**
     * @var CreateRequestContract $command
     */
    $command = app()->make(
        abstract: CreateRequestContract::class,
    );

    expect(
        Request::query()->count(),
    )->toEqual(0);

    $command->handle(
        payload: new NewRequest(
            name: $string,
            status: Status::PENDING,
            description: $string,
        ),
        user: User::factory()->create()->getKey(),
    );

    expect(
        Request::query()->count(),
    )->toEqual(1);
})->with('strings');
