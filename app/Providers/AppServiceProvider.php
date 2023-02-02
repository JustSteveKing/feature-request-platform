<?php

declare(strict_types=1);

namespace App\Providers;

use App\Commands\Requests\CreateRequest;
use App\Commands\Requests\UpdateRequest;
use App\Commands\Requests\UpvoteRequest;
use App\Contracts\Commands\Requests\CreateRequestContract;
use App\Contracts\Commands\Requests\UpdateRequestContract;
use App\Contracts\Commands\Requests\UpvoteRequestContract;
use App\Projectors\Requests\UpvoteProjector;
use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;

final class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Commands
        CreateRequestContract::class => CreateRequest::class,
        UpdateRequestContract::class => UpdateRequest::class,
        UpvoteRequestContract::class => UpvoteRequest::class,
    ];

    public function boot(): void
    {
        Projectionist::addProjector(UpvoteProjector::class);
    }
}
