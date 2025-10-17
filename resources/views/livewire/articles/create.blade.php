<?php

use function Livewire\Volt\{state, rules};
use App\Models\Article;

state(['title', 'body']);

rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
]);

// 論文を保存する関数
$store = function () {
    $this ->validate();
    // フォームからの入力値をデータベースへ保存
    Article::create([
        'title' => $this->title,
        'body' => $this->body,
    ]);
    // 一覧ページにリダイレクト
    return redirect()->route('articles.index');
};
?>

<div>
    <h1>新規論文投稿</h1>
    <div class="form-container">
        <!-- wire:submit="store"でフォーム送信時にstore関数を呼び出し -->
        <form wire:submit="store">
            <p>
                <label for="title">論文タイトル</label>
                @error('title')
                    <span class="error">({{ $message }})</span>
                @enderror
                <br>
                <!-- wire:model="title"で入力値とコンポーネントの状態($this->title)を自動的に同期 -->
                <input type="text" wire:model="title" id="title">
            </p>
            <p>
                <label for="body">本文</label>
                @error('body')
                    <span class="error">({{ $message }})</span>
                @enderror                
                
                <br>
                <!-- wire:model="body"で入力値とコンポーネントの状態($this->body)を自動的に同期 -->
                <textarea wire:model="body" id="body"></textarea>
            </p>

            <button type="submit">投稿</button>
        </form>
    </div>
</div>
