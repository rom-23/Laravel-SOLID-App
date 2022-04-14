<?php namespace App\Repositories;

use App\Http\Requests\MenuStoreRequest;
use App\Models\Menu;

interface MenuRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(MenuStoreRequest $request, Menu $menu);

    public function delete(Menu $menu);

    public function show($id);

    public function store(MenuStoreRequest $request);
}
