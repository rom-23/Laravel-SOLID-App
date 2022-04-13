<?php namespace App\Repositories;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(CategoryRequest $request, Category $category);

    public function delete(Category $category);

    public function show($id);

    public function store(CategoryRequest $request);
}
