<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/register', \Modules\User\Http\Controllers\Auth\RegisterController::class);

Route::get('/', function () {

//    return 'sdas';
    $userV1 = app()->make(\Connections\UserV2\Resources\UserResource::class);

//    dd($userV1->list()->chunk(50));
//    dd($userV1->list()->chunk(50));

    $chunkedUsers = $userV1->list()->chunk(25);

//    dd($chunkedUsers);

    $insertData = [];

//    \Modules\User\Models\User::query()->insert();

//    collect()->all()

    foreach ($chunkedUsers as $collection)
    {

//        dd($user);
//        dd($collection);
        foreach ($collection as $user)
        {
            try {


                $users = $collection->map(function ($user) {
                    return $user->toArray();
                });
//                dd($users->toArray());
//                return \Illuminate\Support\Facades\Validator::make($user->toArray(), [
//                    'email' => 'unique:users,email'
//                ])->;

//                dd($validate);
//                dd(collect((new \Modules\User\Services\UserService(new \Modules\User\Repositories\UserRepository()))
//                    ->getAllUsers())->forPage(1, 20));
            } catch (\Exception $e) {
                return $e;
            }
        }
//        dd('ss');
//        dd(json_decode($collection, true));
//        dd(json_decode($collection, true));
//        dd(\Modules\User\Models\User::insert(json_decode($collection, true)));
    }

});
