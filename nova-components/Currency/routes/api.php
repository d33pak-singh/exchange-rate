<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException as GuzzleException;
/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

// Route::get('/endpoint', function (Request $request) {
//     //
// });
Route::get('/getRate', function () {
    try {
      $client = new GuzzleClient();
      $res = $client->request('GET', 'https://api.exchangeratesapi.io/latest?base=INR&symbols=USD,GBP,EUR');
      $response = ["succ" => true, "result" => json_decode($res->getBody())];
    } catch (GuzzleException $e) {
      $response = ["succ" => false, "_err_code" => "Something went wrong with api!"];
    } catch (\Exception $e) {
      $response = ["succ" => false, "_err_code" => "Something went wrong!"];
    }
    
    return response()->json($response);
});
