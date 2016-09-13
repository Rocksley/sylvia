<?php
use App\Route;
return [

Route::get('/','HomeController@welcome'),
Route::get('/home','HomeController@login'),
]
?>
