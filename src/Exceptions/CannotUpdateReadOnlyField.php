<?php
declare(strict_types=1);

namespace Temperworks\ReadOnlyFields\Exceptions;


class CannotUpdateReadOnlyField extends \Exception
{
    public static function forFields(array $fields)
    {
        if(count($fields) === 1){
            return new self("Field {$fields[0]} is read only");
        }

        $fieldsString = implode(', ', $fields);
        return new self("Fields {$fieldsString} are read only");
    }
}
