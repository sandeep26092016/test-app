<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanApplicationApiController;
use App\Http\Controllers\LoanRepaymentApiController;


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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post("login",[UserController::class,'index']);

/*Route::get("/loan-application",function(){
    return LoanApplication::all();
});*/

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('/loan-application/{user}', [LoanApplicationApiController::class, 'index']);
    Route::post('/loan-application', [LoanApplicationApiController::class, 'store']);
    Route::put('/loan-application/{application}', [LoanApplicationApiController::class, 'update']);
    Route::delete('/loan-application/{application}', [LoanApplicationApiController::class, 'destroy']);

    Route::get('/loan-repayment/{loanApplicationId}', [LoanRepaymentApiController::class, 'index']);
    Route::put('/loan-repayment/{loanApplicationId}', [LoanRepaymentApiController::class, 'update']);
    Route::delete('/loan-repayment/{loanApplicationId}', [LoanRepaymentApiController::class, 'destroy']);
});

