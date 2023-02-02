<?php

declare(strict_types=1);

namespace App\Contracts\Commands\Requests;

interface UpvoteRequestContract
{
    public function handle(string $user, string $id): bool;
}
