<?php

declare(strict_types=1);

namespace App\Projectors\Requests;

use App\Contracts\Commands\Requests\UpvoteRequestContract;
use App\Events\Requests\RequestWasUpvoted;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

final class UpvoteProjector extends Projector
{
    public function __construct(
        private readonly UpvoteRequestContract $command,
    ) {}

    protected array $handlesEvents = [
        RequestWasUpvoted::class => 'onRequestWasUpvoted',
    ];

    public function onRequestWasUpvoted(RequestWasUpvoted $event): void
    {
        $this->command->handle(
            user: $event->user,
            request: $event->request,
        );
    }
}
