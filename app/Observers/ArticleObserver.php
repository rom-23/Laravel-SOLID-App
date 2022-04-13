<?php

namespace App\Observers;

use App\Models\Article;
use Illuminate\Support\Str;

/**
 * Class ArticleObserver
 * @package App\Observers
 */
class ArticleObserver
{
    /**
     * @param Article $article
     * @return void
     */
    public function created(Article $article): void
    {
        $article->slug = Str::slug($article->title, '-');
        $article->save();
    }

    /**
     * @param Article $article
     * @return void
     */
    public function updated(Article $article): void
    {
        $article->slug = Str::slug($article->title, '-');
        $article->saveQuietly();
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param Article $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param Article $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param Article $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
