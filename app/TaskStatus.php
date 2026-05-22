<?php

namespace App;

enum TaskStatus: string
{
    case TO_DO = 'to_do';
    case IN_PROGRESS = 'in_progress';
    case DONE = 'done';
    case CANCELLED = 'cancelled';

    public function label() : string {
        return match ($this) {
            self::TO_DO => 'To Do',
            self::IN_PROGRESS => 'In Progress',
            self::DONE => 'Done',
            self::CANCELLED => 'Cancelled', 
        };
    }
}
