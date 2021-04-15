# Laravel read only fields

[comment]: <> ([![Latest Version on Packagist]&#40;https://img.shields.io/packagist/v/temperworks/laravel_read_only_fields.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/temperworks/laravel_read_only_fields&#41;)

[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/temperworks/laravel-read-only-fields/run-tests?label=tests)](https://github.com/TemperWorks/laravel-read-only-fields/actions?query=workflow%3Arun-tests+branch%3Amain)

[comment]: <> ([![GitHub Code Style Action Status]&#40;https://img.shields.io/github/workflow/status/temperworks/laravel_read_only_fields/Check%20&%20fix%20styling?label=code%20style&#41;]&#40;https://github.com/temperworks/laravel_read_only_fields/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster&#41;)

[comment]: <> ([![Total Downloads]&#40;https://img.shields.io/packagist/dt/temperworks/laravel_read_only_fields.svg?style=flat-square&#41;]&#40;https://packagist.org/packages/temperworks/laravel_read_only_fields&#41;)

Laravel read only fields lets you guard fields against unexpected updates. 

An example use case for this might be when a projector in an event sourced system updates a read model. You want to make sure that the read model only gets updated by the projector.

## Guarding fields on a model
To guard fields use the `HasReadOnlyFields` trait in your model, and specify the read only fields by creating an array on your model named `$readOnlyFields`

```php 
use Illuminate\Database\Eloquent\Model;
use Temperworks\ReadOnlyFields\HasReadOnlyFields;

class YourModel extends Model
{
    use HasReadOnlyFields;

    protected array $readOnlyFields = [
        'read_only_field'
    ];
}
```


## Updating read only fields

When you want to update a read only field, you can mark that you intend to update the field by using `writable(['read_only_field'])`.
After the model is saved, the writable state is reset.
```php

$model = YourModel::find(1);
$model->writable(['read_only_field'])->update(['read_only_field' => 'foo']);

// this will throw an exception since we already updated the model. 
$model->update(['read_only_field' => 'foobar']);
```

## Credits

- [Robert Baelde](https://github.com/robertbaelde)
- [All Contributors](../../contributors)

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
