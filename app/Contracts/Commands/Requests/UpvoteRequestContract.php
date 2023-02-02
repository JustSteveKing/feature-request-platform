<?php

declare(strict_types=1);

namespace App\Contracts\Commands\Requests;

use App\Models\Request;

interface UpvoteRequestContract
{
    public function handle(string $user, Request $request): bool;
}
