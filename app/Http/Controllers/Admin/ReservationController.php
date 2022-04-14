<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservations;
use App\Models\Tables;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
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
        $tables = Tables::where('status', TableStatus::Available)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    /**
     * @param ReservationStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ReservationStoreRequest $request): RedirectResponse
    {
        $table = Tables::findOrFail($request->tables_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') === $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }
        Reservations::create($request->validated());

        return to_route('admin.reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * @param  int  $id
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
     * Update the specified resource in storage.
     *
     * @param ReservationStoreRequest $request
     * @param Reservations $reservation
     * @return RedirectResponse
     */
    public function update(ReservationStoreRequest $request, Reservations $reservation): RedirectResponse
    {
        $table = Tables::findOrFail($request->tables_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res) {
            if ($res->res_date->format('Y-m-d') === $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        $reservation->update($request->validated());
        return to_route('admin.reservations.index')->with('success', 'Reservation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reservations $reservation
     * @return RedirectResponse
     */
    public function destroy(Reservations $reservation): RedirectResponse
    {
        $reservation->delete();

        return to_route('admin.reservations.index')->with('warning', 'Reservation deleted successfully.');
    }
}
