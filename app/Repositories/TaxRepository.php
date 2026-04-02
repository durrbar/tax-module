<?php

declare(strict_types=1);

namespace Modules\Tax\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Tax\Models\Tax;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

class TaxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    public function boot(): void
    {
        try {
            $this->pushCriteria(app(RequestCriteria::class));
        } catch (RepositoryException $e) {
            //
        }
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Tax::class;
    }
}
