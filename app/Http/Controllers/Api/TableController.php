<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tables;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\MenuRepositoryInterface;
use App\Repositories\TableRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class TableController extends Controller
{
    /**
     * @var Tables
     */
    public Tables $table;

    /**
     * @var TableRepositoryInterface
     */
    protected TableRepositoryInterface $tableRepository;

    /**
     * @param TableRepositoryInterface $tableRepository
     */
    public function __construct(TableRepositoryInterface $tableRepository)
    {
        $this->tableRepository = $tableRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getAllTables(): JsonResponse
    {
        return response()->json($this->tableRepository->all());
    }

}
