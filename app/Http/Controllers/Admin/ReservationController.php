<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Category;
use App\Models\Reservations;
use App\Models\Tables;
use App\Repositories\ReservationRepositoryInterface;
use App\Repositories\TableRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class ReservationController
 * @package App\Http\Controllers\Admin
 */
class ReservationController extends Controller
{
    public Reservations $reservation;
    protected ReservationRepositoryInterface $reservationRepository;
    protected TableRepositoryInterface $tableRepository;

    /**
     * @param ReservationRepositoryInterface $reservationRepository
     * @param TableRepositoryInterface $tableRepository
     * @param Reservations $reservation
     */
    public function __construct(ReservationRepositoryInterface $reservationRepository,
                                TableRepositoryInterface       $tableRepository,
                                Reservations                   $reservation)
    {
        $this->reservation = $reservation;
        $this->reservationRepository = $reservationRepository;
        $this->tableRepository = $tableRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $reservations = Reservations::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.reservations.create', [
            'tables' => $this->tableRepository->getAvailableTables()
        ]);
    }

    /**
     * @param ReservationStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ReservationStoreRequest $request): RedirectResponse
    {
        if (!empty($this->reservationRepository->store($request))) {
            return back()->with($this->reservationRepository->store($request)['status'], $this->reservationRepository->store($request)['message']);
        }

        return to_route('admin.reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show($id): void
    {
        //
    }

    /**
     * @param Reservations $reservation
     * @return Application|Factory|View
     */
    public function edit(Reservations $reservation): View|Factory|Application
    {
        $tables = Tables::where('status', TableStatus::Available)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * @param ReservationStoreRequest $request
     * @param Reservations $reservation
     * @return RedirectResponse
     */
    public function update(ReservationStoreRequest $request, Reservations $reservation): RedirectResponse
    {
        if (!empty($this->reservationRepository->update($request, $reservation))) {
            return back()->with($this->reservationRepository->update($request, $reservation)['status'], $this->reservationRepository->update($request,$reservation)['message']);
        }
        return to_route('admin.reservations.index')->with('success', 'Reservation updated successfully.');
    }

    /**
     * @param Reservations $reservation
     * @return RedirectResponse
     */
    public function destroy(Reservations $reservation): RedirectResponse
    {
        $this->reservationRepository->delete($reservation);
        return to_route('admin.reservations.index')->with('warning', 'Reservation deleted successfully.');
    }
}
