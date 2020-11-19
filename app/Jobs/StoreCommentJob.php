<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class StoreCommentJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $params;
    private $article;

    public function __construct($params, Article $article) {
        $this->params = $params;
        $this->article = $article;
    }

    public function handle() {
        DB::transaction(function () {
            $this->article->comments()->create([
                'theme'      => $this->params['theme'],
                'body'       => $this->params['body'],
                'article_id' => $this->article->id,
            ]);
        });

    }
}
