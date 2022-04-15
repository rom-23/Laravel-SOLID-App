<?php

namespace App\Observers;

use App\Models\Menu;
use Illuminate\Support\Str;

class MenuObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param Menu $menu
     * @return void
     */
    public function creating(Menu $menu): void
    {
    }

    /**
     * Handle the Menu "created" event.
     *
     * @param Menu $menu
     * @return void
     */
    public function created(Menu $menu): void
    {
        $menu->slug = Str::slug($menu->name);
        $menu->save();
    }

    /**
     * Handle the Menu "updated" event.
     *
     * @param Menu $menu
     * @return void
     */
    public function updated(Menu $menu): void
    {
        //
    }

    /**
     * Handle the Menu "deleted" event.
     *
     * @param Menu $menu
     * @return void
     */
    public function deleted(Menu $menu)
    {
        //
    }

    /**
     * Handle the Menu "restored" event.
     *
     * @param Menu $menu
     * @return void
     */
    public function restored(Menu $menu)
    {
        //
    }

    /**
     * Handle the Menu "force deleted" event.
     *
     * @param Menu $menu
     * @return void
     */
    public function forceDeleted(Menu $menu)
    {
        //
    }
}
