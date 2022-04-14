<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\MenuRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class MenuController extends Controller
{
    /**
     * @var Menu
     */
    public Menu $menu;

    /**
     * @var MenuRepositoryInterface
     */
    protected MenuRepositoryInterface $menuRepository;

    /**
     * @var CategoryRepositoryInterface
     */

    protected CategoryRepositoryInterface $categoryRepository;
    /**
     * @param MenuRepositoryInterface $menuRepository
     * @param CategoryRepositoryInterface $categoryRepository
     * @param Menu $menu
     */
    public function __construct(MenuRepositoryInterface $menuRepository, CategoryRepositoryInterface $categoryRepository, Menu $menu)
    {
        $this->menu = $menu;
        $this->menuRepository = $menuRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getAllMenus(): JsonResponse
    {
        return response()->json($this->menuRepository->all());
    }
}
