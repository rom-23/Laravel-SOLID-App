<?php

namespace App\Repositories;

use App\Enums\TableStatus;
use App\Models\Reservations;
use App\Models\Tables;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ArrayShape;
use JsonException;
use function PHPUnit\Framework\isEmpty;

/**
 * Class ReservationRepository
 * @package App\Repositories
 */
class ReservationRepository implements ReservationRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Reservations::all();
    }

    /**
     * @param array $data
     * @return Reservations|Model
     */
    public function create(array $data): Model|Reservations
    {
        return Reservations::create($data);
    }

    /**
     * @param $request
     * @param $reservation
     * @return array
     */
    public function update($request, $reservation): array
    {
        $table = Tables::findOrFail($request->tables_id);
        if (!empty($this->checkTableGuests($request, $table))) {
            return $this->checkTableGuests($request, $table);
        }
        if (!empty($this->checkTableDates($request, $table))) {
            return $this->checkTableDates($request, $table);
        }
        $reservation->update($request->validated());
        return [];
    }


    public function delete(Reservations $reservation): void
    {
        $reservation->delete();
        Reservations::destroy($reservation);
    }


    public function show($id)
    {
        return Reservations::findOrFail($id);
    }

    /**
     * @param $request
     * @return array
     */
    public function store($request): array
    {
        $table = Tables::findOrFail($request->tables_id);
        if (!empty($this->checkTableGuests($request, $table))) {
            return $this->checkTableGuests($request, $table);
        }
        if (!empty($this->checkTableDates($request, $table))) {
            return $this->checkTableDates($request, $table);
        }

        Reservations::create($request->validated());
        return [];
    }

    #[ArrayShape(['status' => "string", 'message' => "string"])]
    public function checkTableGuests($request, $table): array
    {
        if ($request->guest_number > $table->guest_number) {
            return [
                'status' => 'warning',
                'message' => 'Please choose the table base on guests.'
            ];
        }

        return [];
    }

    #[ArrayShape(['status' => "string", 'message' => "string"])]
    public function checkTableDates($request, $table): array
    {
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') === $request_date->format('Y-m-d')) {
                return [
                    'status' => 'warning',
                    'message' => 'This table is reserved for this date.'
                ];
            }
        }
        return [];
    }

}
