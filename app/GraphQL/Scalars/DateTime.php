<?php

namespace App\GraphQL\Scalars;

use GraphQL\Language\AST\NodeKind;
use GraphQL\Type\Definition\ScalarType;
use GraphQL\Utils\Utils;

class DateTime extends ScalarType
{
    public $name = 'DateTime';

    public function serialize($value)
    {
        // Convert PHP DateTime object to ISO8601 string
        return $value instanceof \DateTime ? $value->format(DATE_ISO8601) : null;
    }

    public function parseValue($value)
    {
        // Convert ISO8601 string to PHP DateTime object
        return $value ? new \DateTime($value) : null;
    }

    public function parseLiteral($ast)
    {
        if ($ast->kind === NodeKind::STRING) {
            return new \DateTime($ast->value);
        }
        return null;
    }
}
