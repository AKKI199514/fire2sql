<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testlist', 'TestController@testlist')->name('testlist');
/*Route::get('/userConvert', 'HomeController@userConvert')->name('dbconvertdata');
Route::get('/FollowingConvert', 'FollowingController@FollowingConvert')->name('FollowingConvert');
Route::get('/followersConvert', 'FollowingController@followersConvert')->name('followersConvert');
Route::get('/userPassword', 'UserPasswordController@userPassword')->name('userPassword');
Route::get('/postConvert', 'PostController@PostConvert')->name('PostConvert');
Route::get('/PostAttachmentConvert', 'PostAttachmentController@PostAttachmentConvert')->name('PostAttachmentConvert');
Route::get('/PlacesConvert', 'PlacesController@PlacesConvert')->name('PlacesConvert');
Route::get('/PlacesCoverImagesConvert', 'PlacesCoverImagesController@PlacesCoverImagesConvert')->name('PlacesCoverImagesConvert');
Route::get('/PlacesGalleryImagesConvert', 'PlacesGalleryImagesController@PlacesGalleryImagesConvert')->name('PlacesGalleryImagesConvert');
Route::get('/PlacesOpenigHoursConvert', 'PlacesOpenigHoursController@PlacesOpenigHoursConvert')->name('PlacesOpenigHoursConvert');
Route::get('/PlacesUsedTagsConvert', 'PlacesUsedTagsController@PlacesUsedTagsConvert')->name('PlacesUsedTagsConvert');*/

// -------------------------------------------------------------------------------------- //

Route::get('/Places', 'TestController@Places')->name('Places');
Route::get('/user', 'TestController@user')->name('user');
Route::get('/userpassword', 'TestController@userpassword')->name('userpassword');
Route::get('/userpasswordmove', 'TestController@userpasswordmove')->name('userpasswordmove');
Route::get('/post', 'TestController@post')->name('post');
Route::get('/postAttachment', 'TestController@postAttachment')->name('postAttachment');
Route::get('/postLike', 'TestController@postLike')->name('postLike');
Route::get('/PlaceCategories', 'TestController@PlaceCategories')->name('PlaceCategories');
Route::get('/PlaceTags', 'TestController@PlaceTags')->name('PlaceTags');
Route::get('/PlaceCoverImages', 'TestController@PlaceCoverImages')->name('PlaceCoverImages');
Route::get('/PlaceGalleryImages', 'TestController@PlaceGalleryImages')->name('PlaceGalleryImages');
Route::get('/PlaceOpenigHours', 'TestController@PlaceOpenigHours')->name('PlaceOpenigHours');
Route::get('/PlaceUsedTags', 'TestController@PlaceUsedTags')->name('PlaceUsedTags');
Route::get('/PlaceReview', 'TestController@PlaceReview')->name('PlaceReview');
Route::get('/PlaceReviewPending', 'TestController@PlaceReviewPending')->name('PlaceReviewPending');
Route::get('/PostTags', 'TestController@PostTags')->name('PostTags');
Route::get('/Following', 'TestController@Following')->name('Following');
Route::get('/Followers', 'TestController@Followers')->name('Followers');
Route::get('/PostComments', 'TestController@PostComments')->name('PostComments');
Route::get('/PlaceComments', 'TestController@PlaceComments')->name('PlaceComments');
Route::get('/PostCommentLike', 'TestController@PostCommentLike')->name('PostCommentLike');
Route::get('/PlaceCommentLike', 'TestController@PlaceCommentLike')->name('PlaceCommentLike');
Route::get('/QueuedPlaces', 'TestController@QueuedPlaces')->name('QueuedPlaces');
Route::get('/QueuedPlacesCoverImages', 'TestController@QueuedPlacesCoverImages')->name('QueuedPlacesCoverImages');
Route::get('/QueuedPlacesGalleryImages', 'TestController@QueuedPlacesGalleryImages')->name('QueuedPlacesGalleryImages');
Route::get('/feeds', 'TestController@feeds')->name('feeds');


// -------------------------------------------------------------------------------------- //
Route::prefix('admin')->group(function() {

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
	Route::any('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	Route::get('/customer', 'AdminController@customer_list')->name('admin.customer.list');
	Route::get('/postlist', 'AdminController@postlist')->name('admin.post.list');
});
