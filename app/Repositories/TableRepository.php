<?php

namespace App\Repositories;

use App\Enums\TableStatus;
use App\Models\Tables;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class TableRepository
 * @package App\Repositories
 */
class TableRepository implements TableRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Tables::all();
    }

    /**
     * @return Collection|array
     */
    public function getAvailableTables(): Collection|array
    {
        return Tables::where('status', TableStatus::Available)->get();
    }

    /**
     * @param array $data
     * @return Tables|Model
     */
    public function create(array $data): Model|Tables
    {
        return Tables::create($data);
    }

    /**
     * @param $request
     * @param $table
     * @return bool|int
     */
    public function update($request, $table): bool|int
    {
        return Tables::whereId($table->id)->update($request->validated());
    }

    /**
     * @param Tables $table
     * @return void
     */
    public function delete(Tables $table): void
    {
        $table->reservations()->delete();
        $table->delete();
        Tables::destroy($table);
    }

    /**
     * @param $id
     * @return Tables|Tables[]|Collection|Model
     */
    public function show($id): Model|Collection|Tables|array
    {
        return Tables::findOrFail($id);
    }

    /**
     * @param $request
     * @return void
     */
    public function store($request): void
    {
        Tables::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);
    }

}
