<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    //Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
    Route::post('/add-category', 'categoryController@add_category');
    Route::get('category', 'categoryController@all_category');
    Route::get('category/{id}', 'categoryController@delete_category');
    Route::get('editcategory/{id}', 'categoryController@edit_category');
    Route::post('update-category/{id}', 'categoryController@update_category');

     //Post Route
    Route::get('/post', 'PostController@all_post');
    Route::post('/savepost', 'PostController@save_post');
    Route::get('/delete/{id}','PostController@delete_post');
    Route::get('/post/{id}','PostController@edit_post');
    Route::post('/update/{id}','PostController@update_post');
  });


    Route::get('/blogpost','BlogController@get_all_blog_post');
    Route::get('/singlepost/{id}','BlogController@getpost_by_id');
    Route::get('/categories','BlogController@get_all_category');
    Route::get('/categorypost/{id}','BlogController@get_all_post_by_cat_id');
    Route::get('/search','BlogController@search_post');
    Route::get('/latestpost','BlogController@latest_post');

