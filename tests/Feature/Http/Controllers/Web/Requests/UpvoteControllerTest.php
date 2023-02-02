<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Requests\UpvoteController;
use App\Models\Request;

use App\Models\User;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

it('stores the event when upvoting', function (): void {
    $request = Request::factory()->create();

    expect(
        EloquentStoredEvent::query()->count(),
    )->toEqual(0);

    actingAs(User::factory()->create())->post(
        uri: action(UpvoteController::class, [
            'request' => $request,
        ])
    )->assertRedirect();

    expect(
        EloquentStoredEvent::query()->count(),
    )->toEqual(1);
});
