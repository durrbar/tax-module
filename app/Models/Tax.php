<?php

namespace Modules\Tax\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'tax_classes';

    public $guarded = [];

    protected static function boot()
    {
        parent::boot();
        // Order by updated_at desc
        static::addGlobalScope('order', function (Builder $builder): void {
            $builder->orderBy('updated_at', 'desc');
        });
    }
}
