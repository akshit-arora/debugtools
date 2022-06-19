<?php

use AkshitArora\DebugTools\Http\Controllers\DBLogController;
use Illuminate\Support\Facades\Route;

Route::get('/dblog', [DBLogController::class, 'index'])->name('dblog.index');
Route::post('/dblog/enable', [DBLogController::class, 'enable'])->name('dblog.enable');
