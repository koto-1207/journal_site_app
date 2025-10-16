<?php

use function Livewire\Volt\{state};
use App\Models\Article;
//
state(['article' => fn(Article $article) => $article]);

?>

<div>
    <h1>論文詳細</h1>
    <p class="article_title">タイトル: {{ $article->title }}</p>
    <p>{!! nl2br(e($article->body)) !!}</p>

    <div class="button-container">
        <button onclick="location.href='{{ route('articles.index') }}'">
            一覧に戻る
        </button>

        {{-- ボタンだけ作成 --}}
        <button>
            編集する
        </button>
        <button>
            削除する
        </button>
    </div>
</div>
