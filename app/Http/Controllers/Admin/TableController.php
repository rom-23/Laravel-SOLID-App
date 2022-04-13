<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Tables;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function Ramsey\Uuid\v1;

class TableController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tables = Tables::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.tables.create');
    }

    /**
     * @param TableStoreRequest $request
     * @return RedirectResponse
     */
    public function store(TableStoreRequest $request): RedirectResponse
    {
        Tables::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return to_route('admin.tables.index')->with('success', 'Table created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Tables $table
     * @return Application|Factory|View
     */
    public function edit(Tables $table): View|Factory|Application
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * @param TableStoreRequest $request
     * @param Tables $table
     * @return RedirectResponse
     */
    public function update(TableStoreRequest $request, Tables $table): RedirectResponse
    {
        $table->update($request->validated());

        return to_route('admin.tables.index')->with('success', 'Table updated successfully.');
    }

    /**
     * @param Tables $table
     * @return RedirectResponse
     */
    public function destroy(Tables $table): RedirectResponse
    {
        $table->reservations()->delete();
        $table->delete();

        return to_route('admin.tables.index')->with('danger', 'Table daleted successfully.');
    }
}
