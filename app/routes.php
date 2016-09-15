<?php
use App\Route;
return [

Route::get('/','HomeController@welcome'),
Route::get('login','HomeController@login'),
Route::post('/login','HomeController@postHandler'),
]
?>
