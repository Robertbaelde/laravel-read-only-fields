<?php
declare(strict_types=1);

namespace Temperworks\ReadOnlyFields\Tests;

use Temperworks\ReadOnlyFields\Exceptions\CannotUpdateReadOnlyField;
use Temperworks\ReadOnlyFields\Tests\stub\TestModel;

class ReadOnlyTraitTest extends TestCase
{
    /** @test */
    public function read_only_fields_cannot_be_updated()
    {
        $model = TestModel::create(['read_only_field' => 'foo', 'non_protected_field' => 'foo']);

        $this->expectException(CannotUpdateReadOnlyField::class);
        $model->update(['read_only_field' => 'bar']);
    }

    /** @test */
    public function non_read_only_fields_can_be_updated()
    {
        $model = TestModel::create(['read_only_field' => 'foo', 'non_protected_field' => 'foo']);

        $model->update(['non_protected_field' => 'bar']);

        $this->assertEquals('bar', $model->fresh()->non_protected_field);
    }

    /** @test */
    public function when_a_field_is_marked_writable_it_can_be_updated_once()
    {
        $model = TestModel::create(['read_only_field' => 'foo', 'non_protected_field' => 'foo']);

        $model->writable(['read_only_field'])->update(['read_only_field' => 'bar']);

        $this->assertEquals('bar', $model->fresh()->read_only_field);

        $this->expectException(CannotUpdateReadOnlyField::class);
        $model->update(['read_only_field' => 'foobar']);
        $this->assertEquals('bar', $model->fresh()->read_only_field);
    }



}
