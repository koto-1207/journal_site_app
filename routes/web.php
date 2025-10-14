<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

//論文の一覧表示
Volt::route('/articles', 'memos.index')->name('memos.index');
// 各論文の詳細表示
Volt::route('/articles/{article}', 'memos.show')->name('memos.show');
