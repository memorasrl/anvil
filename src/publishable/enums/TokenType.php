<?php

namespace App\Enums;

enum TokenType: string {
    case REFRESH = 'refresh';
    case AUTH = 'auth';
}
