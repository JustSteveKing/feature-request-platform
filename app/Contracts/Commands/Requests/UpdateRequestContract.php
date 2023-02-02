<?php

declare(strict_types=1);

namespace App\Contracts\Commands\Requests;

use App\Http\DataObject\NewRequest;

interface UpdateRequestContract
{
    public function handle(NewRequest $payload, string $id): bool;
}
