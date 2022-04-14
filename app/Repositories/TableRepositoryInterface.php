<?php namespace App\Repositories;

use App\Http\Requests\TableStoreRequest;
use App\Models\Tables;

interface TableRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(TableStoreRequest $request, Tables $table);

    public function delete(Tables $table);

    public function show($id);

    public function getAvailableTables();

    public function store(TableStoreRequest $request);
}
