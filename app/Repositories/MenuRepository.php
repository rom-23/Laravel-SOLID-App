<?php

namespace App\Repositories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class MenuRepository
 * @package App\Repositories
 */
class MenuRepository implements MenuRepositoryInterface
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function all(): \Illuminate\Support\Collection
    {
        return Menu::orderBy('id','DESC')->get();
    }

    /**
     * @param array $data
     * @return Menu|Model
     */
    public function create(array $data): Model|Menu
    {
        return Menu::create($data);
    }

    /**
     * @param $request
     * @param $menu
     * @return bool|int
     */
    public function update($request, $menu): bool|int
    {
        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }
        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }

        return Menu::whereId($menu->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);
    }

    /**
     * @param Menu $menu
     * @return void
     */
    public function delete(Menu $menu): void
    {
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();
        Menu::destroy($menu);
    }

    /**
     * @param $id
     * @return Menu|Menu[]|Collection|Model
     */
    public function show($id): Model|Collection|Menu|array
    {
        return Menu::findOrFail($id);
    }

    /**
     * @param $request
     * @return void
     */
    public function store($request): void
    {
        $image = $request->file('image')->store('public/menus');
        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);
        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }
    }

}
