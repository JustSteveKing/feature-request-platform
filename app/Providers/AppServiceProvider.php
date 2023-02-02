<?php

declare(strict_types=1);

namespace App\Providers;

use App\Commands\Requests\CreateRequest;
use App\Commands\Requests\UpdateRequest;
use App\Contracts\Commands\Requests\CreateRequestContract;
use App\Contracts\Commands\Requests\UpdateRequestContract;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Commands
        CreateRequestContract::class => CreateRequest::class,
        UpdateRequestContract::class => UpdateRequest::class,
    ];
}
