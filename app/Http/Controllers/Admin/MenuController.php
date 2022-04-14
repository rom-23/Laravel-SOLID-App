<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\MenuRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

/**
 * Class MenuController
 * @package App\Http\Controllers\Admin
 */
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
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('admin.menus.index', [
            'menus' => $this->menuRepository->all()
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.menus.create', [
            'categories' => $this->categoryRepository->all()
        ]);
    }

    /**
      * @param MenuStoreRequest $request
     * @return RedirectResponse
     */
    public function store(MenuStoreRequest $request): RedirectResponse
    {
        $this->menuRepository->store($request);
        return to_route('admin.menus.index')->with('success', 'Menu created successfully.');
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
     * @param Menu $menu
     * @return Application|Factory|View
     */
    public function edit(Menu $menu): View|Factory|Application
    {
        $categories = $this->categoryRepository->all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * @param MenuStoreRequest $request
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function update(MenuStoreRequest $request, Menu $menu): RedirectResponse
    {
        $this->menuRepository->update($request, $menu);
        return to_route('admin.menus.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        $this->menuRepository->delete($menu);
        return to_route('admin.menus.index')->with('danger', 'Menu deleted successfully.');
    }
}
