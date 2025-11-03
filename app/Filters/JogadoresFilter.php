<?php

namespace App\Filters;

use DeepCopy\Exception\PropertyException;
use Illuminate\Http\Request;

class JogadoresFilter extends Filter {

    protected array $allowedOperatorsFields = [
        'gols' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne'],
        'assistencias' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne'],
        'partidas' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne']
    ];


}