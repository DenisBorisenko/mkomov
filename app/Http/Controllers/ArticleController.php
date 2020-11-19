<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Jobs\StoreArticleLikeJob;
use App\Jobs\StoreArticleViewJob;
use App\Jobs\StoreCommentJob;
use App\Models\Article;

class ArticleController extends Controller {

    private const COUNT_ARTICLES_ON_HOME_PAGE = 6;
    private const COUNT_ARTICLES_ON_CATALOG_PAGE = 10;

    public function latest() {
        return Article::latest()
            ->take(self::COUNT_ARTICLES_ON_HOME_PAGE)
            ->get();
    }

    public function index() {
        return Article::paginate(self::COUNT_ARTICLES_ON_CATALOG_PAGE);
    }

    public function show(Article $article) {
        return $article->load('tags', 'comments');
    }

    public function storeLike(Article $article) {
        StoreArticleLikeJob::dispatch($article);

        return $article->likes + 1;
    }

    public function storeView(Article $article) {
        StoreArticleViewJob::dispatch($article);

        return $article->views + 1;
    }

    public function storeComment(StoreCommentRequest $request, Article $article) {
        StoreCommentJob::dispatch($request->all(), $article);
    }

}
