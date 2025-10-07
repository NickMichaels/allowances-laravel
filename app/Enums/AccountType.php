<?php

namespace App\Enums;

enum AccountType: string
{
    case CHECKING = 'checking';
    case SAVING = 'saving';
    case GIVING = 'giving';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
