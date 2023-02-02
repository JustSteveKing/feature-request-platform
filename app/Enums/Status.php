<?php

declare(strict_types=1);

namespace App\Enums;

enum Status: string
{
    case SUBMITTED = 'submitted';
    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
}
