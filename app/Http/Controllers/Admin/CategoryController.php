<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public Category $category;
    protected CategoryRepositoryInterface $categoryRepository;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     * @param Category $category
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, Category $category)
    {
        $this->category = $category;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('admin.categories.index', [
            'categories' => $this->categoryRepository->all()
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('admin.categories.create');
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->categoryRepository->store($request);
        return to_route('admin.categories.index')->with('success', 'Category created successfully.');
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
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category): Application|Factory|View
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $this->categoryRepository->update($request, $category);
        return to_route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $this->categoryRepository->delete($category);
        return to_route('admin.categories.index')->with('danger', 'Category deleted successfully.');
    }
}
