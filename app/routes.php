<?php
use App\Route;
return [

Route::get('/','HomeController@welcome'),
Route::get('/home','HomeController@login'),
Route::get('home/greet','HomeController@greet'),
]
?>
