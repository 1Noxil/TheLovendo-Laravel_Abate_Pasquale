<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('homepage');

Route::get('/articoli/search', [ArticleController::class, 'searchArticles'])->name('articles.search');
Route::get('/articoli', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articoli/{id}', [ArticleController::class, 'index'])->name('articles.category');
Route::get('/articoli/dettagli-annuncio/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profilo/crea-annuncio', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('/flashpage',[ArticleController::class,'flashpage']);
    Route::get('/profilo/dashboard/',[UserController::class,'dashboard'])->name('users.dashboard');
    Route::get('/profilo/modifica-profilo/',[UserController::class,'profile_settings'])->name('users.profile_settings');
    Route::post('/updateProfile',[UserController::class,'updateProfile'])->name('users.updateProfile');
    Route::get('/profilo/i-miei-annunci/',[UserController::class,'my_items'])->name('users.my_items');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::patch('/wishlist/{wishlist}', [WishlistController::class, 'update'])->name('wishlist.update');
    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/users/{article}/edit-article', [UserController::class, 'editArticle'])->name('users.edit_article');
    Route::put('/users/{article}/update-article', [UserController::class, 'updateArticle'])->name('users.update_article');
    Route::delete('/users/{article}/destroy-article', [UserController::class, 'destroyArticle'])->name('users.destroy_article');
    //lavora con noi
    Route::get('/lavora-con-noi', [ContactController::class, 'workWithUs'])->name('workWithUs');
    Route::post('/lavora-con-noi', [ContactController::class, 'sendApplication'])->name('applicationMail');

    /* Contatta venditore */
    Route::post('/contatta-il-venditore/{article}',[ContactController::class, 'contactSeller'])->name('contactSeller');
});

/* SOCALITE */
Route::get('/auth/{social}/redirect',[ProviderController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{social}/callback',[ProviderController::class, 'callback'])->name('social.callback');

/* RevisorZone */

Route::middleware(['auth', 'isRevisor'])->group(function () {
    Route::get('/profilo/zona-revisore/articoli', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('accept/{article}', [RevisorController::class, 'accept'])->name('accept');
    Route::patch('reject/{article}', [RevisorController::class, 'reject'])->name('reject');
    Route::patch('rollback/article', [RevisorController::class, 'rollback'])->name('rollback');
});

Route::post('/lingua/{lang}', [UserController::class, 'setLanguage'])->name('setLocale');