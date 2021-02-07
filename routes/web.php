<?php

use Illuminate\Support\Facades\Route;
use Kmlpandey77\Label\Http\Controllers\LabelController;

Route::resource('labels', LabelController::class);
