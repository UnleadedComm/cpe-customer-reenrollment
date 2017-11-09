<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Validator;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (App::environment('staging')) {
            //$this->middleware('auth');

        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Customer()
    {
        
        return view('customer');

    }


    /**
     * Validate Zip Code.
     *
     * @return \Illuminate\Http\Response
     */
    public function ValidateCustomer($zip, $account_number)
    {

        try {

            //CPE Choice API Call
            $client = new \GuzzleHttp\Client(['headers' => ['Authorization' => 'Token token='.env('APP_CPE_API_TOKEN')], 'base_uri' => env('APP_CPE_API_URL')]);
            $response = $client->request('GET', 'customers', ['http_errors' => false, 'query' => ['zip' => $zip, 'account' => $account_number]]);
            $statuscode = $response->getStatusCode();


            $content = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $header = array(
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            );


            return response()->json($content, $statuscode, $header, JSON_UNESCAPED_UNICODE);



        } catch (\Exception $e){





        }





    }


    /**
     * Validate Meter Number.
     *
     * @return \Illuminate\Http\Response
     */
    public function ValidateMeter($zip, $account_number, $meter_number)
    {

        try {

            //CPE Choice API Call
            $client = new \GuzzleHttp\Client(['headers' => ['Authorization' => 'Token token='.env('APP_CPE_API_TOKEN')], 'base_uri' => env('APP_CPE_API_URL')]);
            $response = $client->request('GET', 'customers', ['http_errors' => false, 'query' => ['zip' => $zip, 'account' => $account_number, 'meter' => $meter_number]]);
            $statuscode = $response->getStatusCode();


            $content = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $header = array(
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            );


            return response()->json($content, $statuscode, $header, JSON_UNESCAPED_UNICODE);



        } catch (\Exception $e){





        }





    }


    /**
     * Get Products for Customer by Id.
     *
     * @return \Illuminate\Http\Response
     */
    public function CustomerProducts($zip, $segment, $utility_id)
    {

        try {

            if($segment == "Residential"){
                $segment = "R";
            } else {
                $segment = "SCOM";
            }

            //CPE Choice API Call
            $client = new \GuzzleHttp\Client(['headers' => ['Authorization' => 'Token token='.env('APP_CPE_API_TOKEN')], 'base_uri' => env('APP_CPE_API_URL')]);
            $response = $client->request('GET', 'utilities/'.$utility_id.'/products', ['http_errors' => false, 'query' => ['zip'=>$zip, 'customer'=>'renewal', 'segment' => $segment]]);
            $statuscode = $response->getStatusCode(); 


            $content = \GuzzleHttp\json_decode($response->getBody()->getContents());
            $header = array(
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            );


            return response()->json($content, $statuscode, $header, JSON_UNESCAPED_UNICODE);



        } catch (\Exception $e){





        }





    }


    /**
     * Get Legal Terms
     *
     * @return \Illuminate\Http\Response
     */
    public function GetLegalTerms($id)
    {


        $client = new \GuzzleHttp\Client(['headers' => ['Authorization' => 'Token token='.env('APP_CPE_API_TOKEN')], 'base_uri' => env('APP_CPE_API_URL')]);
        $response = $client->request('GET', 'utilities/'.$id.'/legal_terms');

        //Get Response Content
        $content = \GuzzleHttp\json_decode($response->getBody()->getContents());


//        dd($request->session()->all());

         //$legalTerms = json_encode($legalTerms, JSON_UNESCAPED_UNICODE);



        $responsecode = 200;

        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        return response()->json($content, $responsecode, $header, JSON_UNESCAPED_UNICODE); 


    }


    /**
     * Final Enrollment
     *
     * @return \Illuminate\Http\Response
     */
    public function Enrollment(Request $request)
    {


        $enrollment = $request->input('enrollment');

        $CompletedEnrollment = [
            'enrollment'=> $enrollment
        ];


        try {

            $client = new \GuzzleHttp\Client(['headers' => ['Authorization' => 'Token token=' . env('APP_CPE_API_TOKEN')], 'base_uri' => env('APP_CPE_API_URL'), 'Content-Type' => 'application/json', 'Accept' => 'application/json']);
            $response = $client->request('POST', 'enrollments', ['json' => $CompletedEnrollment]);
            $results = \GuzzleHttp\json_decode($response->getBody()->getContents());

            if(App::environment('staging')) {
                Log::info("Enrollment Complete " . "(" . Auth::user()->name . " - " . Auth::user()->email . "): ", (array)$results);
            }

            $responsecode = 200;

            $header = array (
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            );

            return response()->json($results, $responsecode, $header, JSON_UNESCAPED_UNICODE);

        } catch(\GuzzleHttp\Exception\RequestException $e){

            $this->errors = json_decode($e->getResponse()->getBody()->getContents());


            $responsecode = 200;

            $header = array (
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
            );

            return response()->json($this->errors, $responsecode, $header, JSON_UNESCAPED_UNICODE); 



        }




    }




}
