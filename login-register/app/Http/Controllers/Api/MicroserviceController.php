<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as Client;
use Illuminate\Support\Facades\Log;
use Config;
use Validator;
use Auth;

class MicroserviceController extends Controller
{

    private static function getCategoryAccessToken() {
        Log::info('In TourDetailController->getCategoryAccessToken()');
        try {
            Log::info('HOLIDAY_M_BASE_URL:'. Config::get('app.HOLIDAY_M_BASE_URL'));
            Log::info('HOLIDAY_M_CLIENT_ID: ' . Config::get('app.HOLIDAY_M_CLIENT_ID'));
            Log::info('HOLIDAY_M_GRANT_TYPE: ' . Config::get('app.HOLIDAY_M_GRANT_TYPE'));
            Log::info('HOLIDAY_M_OAUTH_TOKEN_URL: ' . Config::get('app.HOLIDAY_M_OAUTH_TOKEN_URL'));
            Log::info('HOLIDAY_M_CLIENT_SECRET: ' . Config::get('app.HOLIDAY_M_CLIENT_SECRET'));
            Log::info('Getting the token!');
            $http = new Client(); //GuzzleHttp\Client
            Log::info('after client the token!');
            Log::info('before  post client the token!');
            $response = $http->post(
                Config::get('app.HOLIDAY_M_BASE_URL') . Config::get('app.HOLIDAY_M_OAUTH_TOKEN_URL'),
                [
                    'form_params' => [
                        'grant_type' => Config::get('app.HOLIDAY_M_GRANT_TYPE'),
                        'client_id' => Config::get('app.HOLIDAY_M_CLIENT_ID'),
                        'client_secret' => Config::get('app.HOLIDAY_M_CLIENT_SECRET'),
                        'redirect_uri' => '',
                    ],
                ]
            );
            Log::info('after  post client the token!');
            $array = $response->getBody()->getContents();
            $json = json_decode($array, true);
            $collection = collect($json);
            $access_token = $collection->get('access_token');
            Log::info('Got the token!'); 
            return $access_token;
        } catch (RequestException $e) {
            Log::info('There is some exception in TourDetailController->getCategoryAccessToken()');
            return $e->getResponse()->getStatusCode() . ': ' . $e->getMessage();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('In storetrip->storetrip()');
        $input = $request->all();
        Log::info($request);
    
        $validator = Validator::make($input, [
            'full_name' => 'required',
            'address' => 'required',        
        ]);
    
        if ($validator->fails()) {
            Log::info('if  job condition fails');
            return $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
        }

        try {
            Log::info('Validating given Training data...');
    
            $validatorResponse = $this->validateNewToolData($request);
    
            Log::info('$validatorResponse[success]: ' . $validatorResponse['success']);
    
            if ($validatorResponse['success']) {
    
                Log::info('Calling TourDetailController::getCategoryAccessToken()');
                $access_token = $this->getCategoryAccessToken();
                Log::info('Got the access token from TourDetailController::getCategoryAccessToken(). Now creating Class!');
                Log::info('HOLIDAY_M_BASE_URL . HOLIDAY_M_STORE_URL: ' . Config::get('app.HOLIDAY_M_BASE_URL') . Config::get('app.HOLIDAY_M_STORE_URL'));
            
        
      
                $http = new Client(); //GuzzleHttp\Client
                log::info("before param");
                $response = $http->post(
                    Config::get('app.HOLIDAY_M_BASE_URL') . Config::get('app.HOLIDAY_M_STORE_URL'),
                    [
                        'headers' => [
                            'Accept'     => 'application/json',
                            'Authorization' => 'Bearer ' . $access_token
                        ],
                        'form_params' => [
                            'full_name' => $request->full_name,
                            'address' => $request->address,
                            'user_auth_id' => $request->user_id,
                            'user_email' => $request->user_email,
                          
                        ]
    
                    ]
                );
                log::info("after param");
                Log::info('Got the response from create Training!');
                $responseJson = json_decode($response->getBody()->getContents(), true);
    
                return response()->json($responseJson, 200);
                // return view('home');
                // $successdata = new HomeController;

                // $datasuccess = $successdata->index();
                //  return $datasuccess;
                
            } else { 
                return response()->json($responseJson, 422);
            }
        } catch (\Exception $e) {
            Log::info('There was some exception in TourDetailController->addsiternary()');
            Log::info($e->getMessage());
            $response = [
                'success' => false,
                'data' => '',
                'message' => $e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }


    private function validateNewToolData(Request $request) {
       
        $input = $request->all();
        $validator = Validator::make($input, [
            'full_name' => 'required|string',
            'address' =>'required|string',

        ]);

        if ($validator->fails()) {
            return $response = [
                'success' => false,
                'message' => 'Tool already exits.'
            ];
        } else {
            return $response = [
                'success' => true,
                'message' => 'Tool data is ok to store.'
            ];
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdata() {
        
        Log::info('user ka id aa raha hai data');
        $personal_id=Auth::user()->id;
        Log::info('user ka id aa raha hai'.$personal_id);
        Log::info('In TourDetailController->pdfProfileGetData(): ');
        try {
            $access_token = $this->getCategoryAccessToken();
            Log::info( $access_token . ' :access_token in getAllEducation line 421');
            $url = ''
                . Config::get('app.HOLIDAY_M_BASE_URL')
                . Config::get('app.HOLIDAY_M_GET_URL')
                . '/'
                . $personal_id;
                ;
               
            Log::info('Got the access token from TourDetailController::getCategoryAccessToken(). Now fetching Pdf Profile!');
            Log::info('Pdf Profile Url 151: ' . $url);
            $guzzleClient = new Client(); //GuzzleHttp\Client
            $params = [
                'headers' => [
                    'Accept'     => 'application/json',
                    'Authorization' => 'Bearer ' . $access_token
                ],
            ];
            $response = $guzzleClient->request('GET', $url, $params);
            // Log::info('Got the response from Education!:  '. print_r($response, true));
            $json = json_decode($response->getBody()->getContents(), true);
            // Log::info('Number of objects in response line 162: ' . print_r($json['data'], true));
            return $json;
            // Log::info(print_r($json, true));
           
        } catch (\Exception $e) {
            Log::info('There was some exception in TourDetailController->getHospitalMgmntAccessToken()');
            return $e->getResponse()->getStatusCode() . ': ' . $e->getMessage();
        }
    }

    public function editdata($id) {
        
        Log::info('user ka id aa raha hai data: '. $id);
    // $personal_id=Auth::user()->id;
    // Log::info('user ka id aa raha hai'.$personal_id);
        Log::info('In TourDetailController->pdfProfileGetData(): ');
        try {
            $access_token = $this->getCategoryAccessToken();
            Log::info( $access_token . ' :access_token in getAllEducation line 421');
            $url = ''
                . Config::get('app.HOLIDAY_M_BASE_URL')
                . Config::get('app.HOLIDAY_M_EDIT_URL')
                . '/'
                . $id;
               
            Log::info('Got the access token from TourDetailController::getCategoryAccessToken(). Now fetching Pdf Profile!');
            Log::info('Pdf Profile Url 151: ' . $url);
            $guzzleClient = new Client(); //GuzzleHttp\Client
            $params = [
                'headers' => [
                    'Accept'     => 'application/json',
                    'Authorization' => 'Bearer ' . $access_token
                ],
            ];
            $response = $guzzleClient->request('GET', $url, $params);
            // Log::info('Got the response from Education!:  '. print_r($response, true));
            $json = json_decode($response->getBody()->getContents(), true);
            Log::info('Number of objects in response line 252: ' . print_r($json['data'], true));
            return $json;
            Log::info(print_r($json, true));
           
        } catch (\Exception $e) {
            Log::info('There was some exception in TourDetailController->getHospitalMgmntAccessToken()');
            return $e->getResponse()->getStatusCode() . ': ' . $e->getMessage();
        }
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {    {
        Log::info('In storetrip->storetrip()');
        $input = $request->all();
        Log::info($request);
    
        $validator = Validator::make($input, [
            'full_name' => 'required',
            'address' => 'required',        
        ]);
    
        if ($validator->fails()) {
            Log::info('if  job condition fails');
            return $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
        }

        try {
            Log::info('Validating given Training data...');
    
            $validatorResponse = $this->validateNewToolData($request);
    
            Log::info('$validatorResponse[success]: ' . $validatorResponse['success']);
    
            if ($validatorResponse['success']) {
    
                Log::info('Calling TourDetailController::getCategoryAccessToken()');
                $access_token = $this->getCategoryAccessToken();
                Log::info('Got the access token from TourDetailController::getCategoryAccessToken(). Now creating Class!');
                Log::info('HOLIDAY_M_BASE_URL . HOLIDAY_M_STORE_URL: ' . Config::get('app.HOLIDAY_M_BASE_URL') . Config::get('app.HOLIDAY_M_STORE_URL'));
            
        
      
                $http = new Client(); //GuzzleHttp\Client
                log::info("before param");
                $response = $http->post(
                    Config::get('app.HOLIDAY_M_BASE_URL') . Config::get('app.HOLIDAY_M_UPDATE_URL'),
                    [
                        'headers' => [
                            'Accept'     => 'application/json',
                            'Authorization' => 'Bearer ' . $access_token
                        ],
                        'form_params' => [
                            'full_name' => $request->full_name,
                            'address' => $request->address,
                            'user_auth_id' => $request->user_id,
                            'user_email' => $request->user_email,
                            'id' => $request->id,
                          
                        ]
    
                    ]
                );
                log::info("after param");
                Log::info('Got the response from create Training!');
                $responseJson = json_decode($response->getBody()->getContents(), true);
    
                return response()->json($responseJson, 200);
                // return view('home');
                // $successdata = new HomeController;

                // $datasuccess = $successdata->index();
                //  return $datasuccess;
                
            } else { 
                return response()->json($responseJson, 422);
            }
        } catch (\Exception $e) {
            Log::info('There was some exception in TourDetailController->addsiternary()');
            Log::info($e->getMessage());
            $response = [
                'success' => false,
                'data' => '',
                'message' => $e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        Log::info('user delete ka id aa raha hai data: '. $id);
    // $personal_id=Auth::user()->id;
    // Log::info('user ka id aa raha hai'.$personal_id);
        Log::info('In TourDetailController->pdfProfileGetData(): ');
        try {
            $access_token = $this->getCategoryAccessToken();
            Log::info( $access_token . ' :access_token in getAllEducation line 421');
            $url = ''
                . Config::get('app.HOLIDAY_M_BASE_URL')
                . Config::get('app.HOLIDAY_M_DELETE_URL')
                . '/'
                . $id;
               
            Log::info('Got the access token from TourDetailController::getCategoryAccessToken(). Now fetching Pdf Profile!');
            Log::info('Pdf Profile Url 151: ' . $url);
            $guzzleClient = new Client(); //GuzzleHttp\Client
            $params = [
                'headers' => [
                    'Accept'     => 'application/json',
                    'Authorization' => 'Bearer ' . $access_token
                ],
            ];
            $response = $guzzleClient->request('GET', $url, $params);
            // Log::info('Got the response from Education!:  '. print_r($response, true));
            $json = json_decode($response->getBody()->getContents(), true);
            Log::info('Number of objects in response line 252: ' . print_r($json['data'], true));
            return $json;
            Log::info(print_r($json, true));
           
        } catch (\Exception $e) {
            Log::info('There was some exception in TourDetailController->getHospitalMgmntAccessToken()');
            return $e->getResponse()->getStatusCode() . ': ' . $e->getMessage();
        }
    }
}
