<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


Route::get('/',
    ['as'   => 'home',
     'uses' => 'HomeController@index'
    ]);
Route::auth();

Route::group(['middleware' => ['auth']], function() {
Route::get('/dashboard',
    ['as'   => 'dashboard',
     'uses' => 'UserController@index',
        'middleware' => ['role:admin']
    ]);

  Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index' , 'middleware' => ['role:admin']]);
    Route::get('users/create', ['as' => 'users.create', 'uses' => 'UserController@create', 'middleware' => ['role:admin']]);
    Route::post('users/create', ['as' => 'users.store', 'uses' => 'UserController@store', 'middleware' => ['role:admin']]);
    Route::get('users/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
    Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit', 'middleware' => ['role:admin']]);
    Route::patch('users/{id}', ['as' => 'users.update', 'uses' => 'UserController@update', 'middleware' => ['role:admin']]);
    Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy', 'middleware' => ['role:admin']]);

    // For Role


    Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index' , 'middleware' => ['role:admin']]);
    Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create', 'middleware' => ['role:admin']]);
    Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store', 'middleware' => ['role:admin']]);
    Route::get('roles/{id}', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
    Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit', 'middleware' => ['role:admin']]);
    Route::patch('roles/{id}', ['as' => 'roles.update', 'uses' => 'RoleController@update', 'middleware' => ['role:admin']]);
    Route::delete('roles/{id}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy', 'middleware' => ['role:admin']]);

    // For Category
    Route::get('posts', ['as' => 'posts.index', 'uses' => 'PostsController@index']);
    Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
    Route::post('posts/create', ['as' => 'posts.store', 'uses' => 'PostsController@store']);
    Route::get('posts/{id}', ['as' => 'post.show', 'uses' => 'PostsController@show']);
    Route::get('posts/{id}/edit', ['as' => 'post.edit', 'uses' => 'PostsController@edit', 'middleware' => ['permission:edit-Post']]);
    Route::patch('posts/{id}', ['as' => 'posts.update', 'uses' => 'PostsController@update', 'middleware' => ['permission:edit-Post']]);
    Route::delete('posts/{id}', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy', 'middleware' => ['permission:delete-post']]);

    //Category
     Route::get('Category', ['as' => 'Category.index', 'uses' => 'CategoryController@index']);
    Route::get('Category/create', ['as' => 'Category.create', 'uses' => 'CategoryController@create']);
    Route::post('Category/create', ['as' => 'Category.store', 'uses' => 'CategoryController@store']);
    Route::get('Category/{id}', ['as' => 'Category.show', 'uses' => 'CategoryController@show']);
    Route::get('Category/{id}/edit', ['as' => 'Category.edit', 'uses' => 'CategoryController@edit', 'middleware' => ['permission:edit-Category']]);
    Route::patch('Category/{id}', ['as' => 'Category.update', 'uses' => 'CategoryController@update', 'middleware' => ['permission:edit-Category']]);
    Route::delete('Category/{id}', ['as' => 'Category.destroy', 'uses' => 'CategoryController@destroy', 'middleware' => ['permission:delete-Category']]);

     //SubCategory
     Route::get('SubCategory', ['as' => 'SubCategory.index', 'uses' => 'SubCategoryController@index']);
    Route::get('SubCategory/create', ['as' => 'SubCategory.create', 'uses' => 'SubCategoryController@create']);
    Route::post('SubCategory/create', ['as' => 'SubCategory.store', 'uses' => 'SubCategoryController@store']);
    Route::get('SubCategory/{id}', ['as' => 'SubCategory.show', 'uses' => 'SubCategoryController@show']);
    Route::get('SubCategory/{id}/edit', ['as' => 'SubCategory.edit', 'uses' => 'SubCategoryController@edit','middleware' => ['permission:edit-SubCategory']]);
    Route::patch('SubCategory/{id}', ['as' => 'SubCategory.update', 'uses' => 'SubCategoryController@update','middleware' => ['permission:edit-SubCategory']]);
    Route::delete('Category/{id}', ['as' => 'SubCategory.destroy', 'uses' => 'SubCategoryController@destroy', 'middleware' => ['permission:delete-SubCategory']]);
    Route::post('posts/comment/{id}', ['as' => 'posts.comment.store', 'uses' => 'PostsController@comment']);
   



});


