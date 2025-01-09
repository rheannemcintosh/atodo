<?php

namespace App;

enum TaskStatus: string
{
    case TO_DO = 'To Do';
    case IN_PROGRESS = 'In Progress';
    case PARTIALLY_COMPLETED = 'Partially Completed';
    case COMPLETED = 'Completed';
    case CANCELLED = 'Cancelled';
}
