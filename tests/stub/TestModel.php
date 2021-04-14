<?php
declare(strict_types=1);

namespace Temperworks\ReadOnlyFields\Tests\stub;


use Illuminate\Database\Eloquent\Model;
use Temperworks\ReadOnlyFields\HasReadOnlyFields;

class TestModel extends Model
{
    use HasReadOnlyFields;

    protected $table = 'test_model';

    protected $guarded = [];

    protected array $readOnlyFields = [
        'read_only_field'
    ];
}
