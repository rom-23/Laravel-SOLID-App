<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Category::all();
    }

    /**
     * @param array $data
     * @return Category|Model
     */
    public function create(array $data): Model|Category
    {
        return Category::create($data);
    }

    /**
     * @param $request
     * @param $category
     * @return bool|int
     */
    public function update($request, $category): bool|int
    {
        $image = $category->image;
        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }
        return Category::whereId($category->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
    }

    /**
     * @param Category $category
     * @return void
     */
    public function delete(Category $category): void
    {
        Storage::delete($category->image);
        $category->menus()->detach();
        $category->delete();
        Category::destroy($category);
    }

    /**
     * @param $id
     * @return Category|Category[]|Collection|Model
     */
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * @param $request
     * @return void
     */
    public function store($request): void
    {
        $image = $request->file('image')->store('public/categories');
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
    }

}
