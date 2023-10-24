<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\AlbumsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('bearer.token')->group(function () {
    Route::get('albums-sold-total', [ArtistsController::class , 'getAlbumsSoldTotalPerArtists']);
    Route::get('combined-album-sales', [ArtistsController::class , 'getCombinedSalesPerArtist']);
    Route::get('top-one-artist', [ArtistsController::class , 'getTopOneArtistsBySold']);
    Route::get('search-artist', [ArtistsController::class , 'searchArtist']);

    Route::post('create-artist', [ArtistsController::class , 'createArtist']);
    Route::get('get-artist-by-id/{iArtistId}', [ArtistsController::class , 'getArtistById']);
    Route::delete('delete-artist-by-id/{iArtistId}', [ArtistsController::class , 'deleteArtistById']);
    Route::patch('update-artist-by-id/{iArtistId}', [ArtistsController::class , 'updateArtistById']);

    Route::post('create-album', [AlbumsController::class , 'createAlbum']);
    Route::get('get-album-by-id/{iAlbumId}', [AlbumsController::class , 'getAlbumById']);
    Route::delete('delete-album-by-id/{iAlbumId}', [AlbumsController::class , 'deleteAlbumById']);
    Route::patch('update-album-by-id/{iAlbumId}', [AlbumsController::class , 'updateAlbumById']);
// });




