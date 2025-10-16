<?php

use function Livewire\Volt\{state};
use App\Models\Article;
//
state(['article' => fn(Article $article) => $article]);

$edit = function () {
    // 編集ページにリダイレクト
    return redirect()->route('articles.edit', $this->article);
};

$destroy = function () {
    $this->article->delete();
    return redirect()->route('articles.index');
};

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
        <button wire:click="edit">編集する</button>
        <button wire:click="destroy" wire:confirm="本当に削除しますか？">
            削除する
        </button>
    </div>
</div>
