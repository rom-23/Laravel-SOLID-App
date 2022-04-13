<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\Pure;

class ArticleController extends Controller
{

    protected ArticleRepository $model;

    #[Pure]
    public function __construct(Article $article)
    {
        $this->model = new ArticleRepository($article);
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
//        $articles = Article::paginate(8);
        return view('article.index', [
            'articles' => $this->model->all()
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): Application|View|Factory
    {
        return view('article.create');
    }

    /**
     * @param ArticleRequest $articleRequest
     * @return RedirectResponse
     */
    public function store(ArticleRequest $articleRequest): RedirectResponse
    {
        $validated = $articleRequest->validated();
//        dd($validated);
        $this->model->create($validated);
        return redirect()->route('articles.index')->with('success', 'Article saved');
    }

    /**
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article): Application|Factory|View
    {
        return view('article.edit', [
            'article' => $article
        ]);
    }

    /**
     * @param ArticleRequest $articleRequest
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(ArticleRequest $articleRequest, Article $article): RedirectResponse
    {
//        $this->articleManager->build($article, $articleRequest);
        return redirect()->route('articles.index')->with('warning', 'Article updated');
    }

    /**
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted');
    }
}
