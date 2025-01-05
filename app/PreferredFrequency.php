<?php

namespace App;

enum PreferredFrequency: string
{
    case DAILY = 'Daily';
    case WEEKLY = 'Weekly';
    case BI_WEEKLY = 'Bi-Weekly';
    case MONTHLY = 'Monthly';
    case QUARTERLY = 'Quarterly';
    case BIANNUALLY = 'Biannually';
    case YEARLY = 'Yearly';
    case INTERMITTENT = 'Intermittent';
    case UNIQUE = 'Unique';
}
