<?php

declare(strict_types=1);

namespace Modules\Tax\Models;

use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\Scopes\OrderByUpdatedAtDescScope;

#[ScopedBy([OrderByUpdatedAtDescScope::class])]
#[Table('tax_classes')]
#[Unguarded]
class Tax extends Model
{
    use HasUuids;
}
