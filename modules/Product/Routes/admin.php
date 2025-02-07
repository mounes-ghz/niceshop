<?php

use Illuminate\Support\Facades\Route;

Route::get('products', [
    'as' => 'admin.products.index',
    'uses' => 'ProductController@index',
    'middleware' => 'can:admin.products.index',
]);

Route::get(
    'products/create',
    [
        'as' => 'admin.products.create',
        'uses' => 'ProductController@create',
        'middleware' => 'can:admin.products.create',
    ]
);

Route::post('products', [
    'as' => 'admin.products.store',
    'uses' => 'ProductController@store',
    'middleware' => 'can:admin.products.create',
]);

Route::get('products/{id}/edit', [
    'as' => 'admin.products.edit',
    'uses' => 'ProductController@edit',
    'middleware' => 'can:admin.products.edit',
]);

Route::put('products/{id}', [
    'as' => 'admin.products.update',
    'uses' => 'ProductController@update',
    'middleware' => 'can:admin.products.edit',
]);

Route::delete('products/{ids}', [
    'as' => 'admin.products.destroy',
    'uses' => 'ProductController@destroy',
    'middleware' => 'can:admin.products.destroy',
]);

Route::get('products/index/table', [
    'as' => 'admin.products.table',
    'uses' => 'ProductController@table',
    'middleware' => 'can:admin.products.index',
]);
Route::post('products/import-from-excel', [
    'as' => 'admin.products.import_from_excel',
    'uses' => 'ProductController@importFromExcel',
    'middleware' => 'can:admin.products.create',
]);



Route::post('products/export-selected', [
    'as' => 'admin.products.export_selected',
    'uses' => 'ProductController@exportSelected',
    'middleware' => 'can:admin.products.index',
]);

Route::post('products/update-from-excel', [
    'as' => 'admin.products.update_from_excel',
    'uses' => 'ProductController@importProducts',
    'middleware' => 'can:admin.products.edit',
]);


