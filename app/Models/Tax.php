<?php

namespace Modules\Tax\Models;

use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\Scopes\OrderByUpdatedAtDescScope;

#[ScopedBy([OrderByUpdatedAtDescScope::class])]
class Tax extends Model
{
    use HasUuids;
    
    protected $table = 'tax_classes';

    public $guarded = [];

}
