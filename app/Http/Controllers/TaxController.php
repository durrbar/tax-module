<?php

namespace Modules\Tax\Http\Controllers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Modules\Core\Exceptions\DurrbarException;
use Modules\Core\Http\Controllers\CoreController;
use Modules\Tax\Http\Requests\CreateTaxRequest;
use Modules\Tax\Http\Requests\UpdateTaxRequest;
use Modules\Tax\Repositories\TaxRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class TaxController extends CoreController
{
    public $repository;

    public function __construct(TaxRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Type[]
     */
    public function index(Request $request)
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return LengthAwarePaginator|Collection|mixed
     *
     * @throws ValidatorException
     */
    public function store(CreateTaxRequest $request)
    {
        $validateData = $request->validated();

        return $this->repository->create($validateData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        try {
            return $this->repository->findOrFail($id);
        } catch (DurrbarException $e) {
            throw new DurrbarException(NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateTaxRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(UpdateTaxRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();

            return $this->repository->findOrFail($id)->update($validatedData);
        } catch (DurrbarException $e) {
            throw new DurrbarException(NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            return $this->repository->findOrFail($id)->delete();
        } catch (DurrbarException $e) {
            throw new DurrbarException(NOT_FOUND);
        }
    }
}
