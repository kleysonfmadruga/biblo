<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::get('/index', function() {
    return "Index Biblo's page";
})->name('index');

Route::prefix('/admin')->group(function() {
    
    // For security, library administrators must contact the Biblo's support team to create, update or delete their accounts.

    Route::prefix('/categories')->group(function(){
        Route::get('/index', function() {
            return "Categories listing route";
        });

        Route::get('/show/{id}', function($id){
            return "Show category and its books route";
        });

        Route::post('/store', function() {
            return "Store category route";
        });

        Route::put('/update/{id}', function($id) {
            return "Update category by id ${id}";
        });

        Route::delete('/delete/{id}', function($id) {
            return "Delete category by id ${id}";
        });
    });

    Route::prefix('/users')->group(function() {
        Route::get('/index', function() {
            return 'User listing route';
        });
    
        Route::get('/show/{id}', function($id){
            return "User get by id = ${id} route";
        });

        Route::post('/show/{id}/store_borrowing', function($id) {
            return "Store new user borrowing by id ${id}";
        });

        Route::put('/show/{id}/renew_borrowing/{borrowing_id}', function($id, $borrowing_id) {
            return "Update user borrowing by id ${id} and borrowing_id ${borrowing_id}";
        });

        Route::delete('/show/{id}/delete_borrowing/{borrowing_id}', function($id, $borrowing_id) {
            return "Delete user borrowing by id ${id} and borrowing_id ${borrowing_id}";
        });
        
        Route::delete('remove/{id}',function($id){
            return "User remove by id = ${id} route";
        });

    });

    Route::prefix('/books')->group(function() {
        Route::get('/index', function() {
            return 'Books listing route';
        });
    
        Route::get('/show/{isbn}', function($isbn){
            return "Books get by isbn = ${isbn} route";
        });        
        
        Route::post('/show/{isbn}/store_copy/', function($isbn){
            return "Store copy ${isbn} route";
        });

        Route::post('show/{isbn}/request_borrowing', function($isbn){
            return "Requesting borrowing of book by isbn ${isbn}";
        });
    
        Route::delete('show/{isbn}/remove_copy/{code}', function($isbn, $code){
            return "Remove copy ${isbn}-${code} route";
        });
    
        Route::get('/new', function() {
            return 'Books creation route';
        });
        
        Route::post('/store', function() {
            return 'Books store route';
        });
        
        Route::put('/update/{isbn}', function($isbn) {
            return "Books update by isbn = ${isbn} route";
        });
    
        Route::delete('remove/{isbn}',function($isbn){
            return "Books remove by isbn = ${isbn} route";
        });

    });

});

Route::prefix('/books')->group(function() {
    Route::post('/list', function(Request $request) {
        return "Searching books by name ".$request->input('name');
    });

    Route::get('/show/{isbn}', function($isbn) {
        return "Showing book by isbn ${isbn}";
    });

    Route::post('show/{isbn}/request_borrowing', function($isbn){
        return "Requesting borrowing of book by isbn ${isbn}";
    });

    Route::put('/show/{isbn}/renew_borrowing/{borrowing_id}', function($isbn, $borrowing_id) {
        return "Update user borrowing by isbn ${isbn} and borrowing_id ${borrowing_id}";
    });
});

Route::prefix('/profile')->group(function() {
    Route::get('/show/{id}', function($id) {
        return "Show profile route";
    });
    
    Route::delete('show/{id}/delete',function($id){
        return "User remove by id = ${id} route";
    });

    Route::get('/new', [UserController::class, 'create'])->name('profile.new');
    
    Route::post('/store', [UserController::class, 'store'])->name('profile.store');

    Route::put('/show/{id}/update', function($id) {
        return "User update by id = ${id} route";
    });

    Route::post('/auth', [UserController::class, 'auth'])->name('profile.login');

});