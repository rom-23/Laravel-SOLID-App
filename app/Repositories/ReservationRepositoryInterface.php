<?php namespace App\Repositories;

use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservations;

interface ReservationRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(ReservationStoreRequest $request, Reservations $reservation);

    public function delete(Reservations $reservation);

    public function show($id);

    public function store(ReservationStoreRequest $request);
}
