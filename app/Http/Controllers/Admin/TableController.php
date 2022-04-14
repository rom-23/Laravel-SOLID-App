<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Tables;
use App\Repositories\TableRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function Ramsey\Uuid\v1;

class TableController extends Controller
{
    public Tables $table;
    protected TableRepositoryInterface $tableRepository;

    /**
     * @param TableRepositoryInterface $tableRepository
     * @param Tables $table
     */
    public function __construct(TableRepositoryInterface $tableRepository, Tables $table)
    {
        $this->table = $table;
        $this->tableRepository = $tableRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tables = $this->tableRepository->all();
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
        $this->tableRepository->store($request);
        return to_route('admin.tables.index')->with('success', 'Table created successfully.');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id): void
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
        $this->tableRepository->update($request, $table);
        return to_route('admin.tables.index')->with('success', 'Table updated successfully.');
    }

    /**
     * @param Tables $table
     * @return RedirectResponse
     */
    public function destroy(Tables $table): RedirectResponse
    {
        $this->tableRepository->delete($table);
        return to_route('admin.tables.index')->with('danger', 'Table daleted successfully.');
    }
}
