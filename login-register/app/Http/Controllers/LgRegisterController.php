<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LgRegisterController extends Controller
{
    public function __construct()
    {
        Log::info('inside PatientController.__construct()');
        $this->middleware('auth', ['except' => ['getStarted']]);
    }

    private function getPatientPasportAPISecretToken () {
        Log::info('In PatientController->getPatientPasportAPISecretToken()...');
        $currentLoggedInUser = Auth::user();
        if ($currentLoggedInUser->active == User::ACTIVE) {
            Log::info('Authenticated User Email: ' . $currentLoggedInUser->email);
            //Log::info('User Email in the request: ' . $request->input('email'));
            $p_user_api_bearer_token = $currentLoggedInUser->createToken('p_user_api_token')-> accessToken;
            Log::info('API Token Created: ' . $p_user_api_bearer_token);
            return $p_user_api_bearer_token;
        }
        return '';
    }

    protected function isUserActive(Request $request)
    {
        Log::info('In PatientController->isUserActive()...');
        $input['email'] = $request->get('email');

        // The below line is similar to User::where('email', $email)->first()->active == 1
        $rules = array('email' => 'required|string|email|max:255|exists:users,' . 'email' . ',active,' . User::ACTIVE);
        // Perform validation
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Log::info('## Failed:: Active user with email: ' . $request->get('email') . ' does not exist');
            return false;
        }
        else {
            Log::info('## Passed:: Active user with email: ' . $request->get('email') . ' exist');
            return true;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info('inside PatientController.index()');
        $profile = Profile::where('user_id', Auth::user()->id)->get();
        $input = $request->all();
        $validator = Validator::make($input, [
            'quoteId' => 'regex:/^[0-9]+$/',
        ]);
        if (!$validator->fails()) {
            $case = '';
            $quoteId = '';
            if($request !== NULL && $request->get('case') != "") {
                $case = $request->get('case');
            }
            if($request !== NULL && $request->get('quoteId') != "") {
                $quoteId = $request->get('quoteId');
            }
            $currentLoggedInUser = Auth::user();
            $isNewUserFirstQuote = false;
            if (!is_null($quoteId) && !empty($quoteId)) {
                $isNewUserFirstQuote = $this->isNewUserFirstQuote($quoteId);
            }
            $new_user_first_quote = true;
            $message = trans('patient-dashboard.first-quote-after-registration');
            Log::info('$isNewUserFirstQuote: ' . $isNewUserFirstQuote);
            if ($isNewUserFirstQuote) {
                $new_user_first_quote = true;
                $message = trans('patient-dashboard.first-quote-after-registration');
            } else {
                $new_user_first_quote = false;
                $message = null;
            }
            //if ($this->isUserActive($request) && $request->get('email') == $currentLoggedInUser->email) {
            if ($currentLoggedInUser->active == User::ACTIVE) {
                $p_user_api_bearer_token = $this->getPatientPasportAPISecretToken();
                switch ($case) {
                    case 'first-quote':
                        /*Log::info('Problem Description: ' . $request->get('problemDesc'));
                        Log::info('Saving Additional Quote Info');*/
                        return view('pages.patient-dashboard', [
                            'new_user_first_quote' => $new_user_first_quote,
                            'profile' => $profile,
                            'message' => $message,
                            'loggedInFlag' => true,
                            'p_user_api_bearer_token' => $p_user_api_bearer_token
                        ]);
                        break;

                    default:
                        return view('pages.patient-dashboard', [
                            'new_user_first_quote' => $new_user_first_quote,
                            'profile' => $profile,
                            'message' => $message,
                            'loggedInFlag' => true,
                            'p_user_api_bearer_token' => $p_user_api_bearer_token
                        ]);
                        break;
                }
            } else {
                Log::info("Currently logged is user is either not active OR user email in the request doesn't match with the currently logged in user's email");
                Log::info('### Currently logged In User email: ' . $currentLoggedInUser->email);
                Log::info('### Email id in the request: ' . $request->get('email'));
                abort(404, "Something went wrong while processing your request!");
            }
        }
    }

    public function getStarted (Request $request) {
        Log::info('inside PatientController.getStarted');
        return view('pages.get-started');
    }

    /**
     * Show additional quote information form
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdditionalQuoteInfoForm(Request $request)
    {
        Log::info('inside PatientController.showAdditionalQuoteInfoForm()');

        // Check is the email id in the request is of an active user or not
        if($this->isUserActive($request)) {
            return view('pages.new-user-activated', [
                "status" => true,
                "user_email" => $request->get('email'),
                "message" => trans('passwords.account-activated')
            ]);
        }
        return view('pages.new-user-activated', [
            "status" => false,
            "message" => trans('passwords.account-activation-failed')
        ]);
    }

    /**
     * Show user dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserDasboard(Request $request)
    {
        Log::info('inside PatientController.showUserDasboard()');
        $input = $request->all();
        Log::info('Validating request data ...');
        $validator = Validator::make($input, [
            'problem_desc' => 'required|string|max:255',
            'quote-request-files' => 'array|max:3',
            'quote-request-files.*' => 'required|file|mimes:jpeg,png,pdf|max:2048'
        ]);
        if ($validator->fails()) {
            Log::info('Validation failed!');
            $data = [
                "status"=> "FAILED",
                "data"=> [
                    "case" =>  'first-quote',
                    "message" => $validator->errors(),
                    "redirect_url" => '#'
                ]
            ];
            return response()->json($data, 422);
        }
        try {
            Log::info('Validation passed!');
            $case = '';
            if($request !== NULL && $request->get('case') != "") {
                $case = $request->get('case');
            }
            $currentLoggedInUser = Auth::user();
            if ($currentLoggedInUser->active == User::ACTIVE) {
                switch ($case) {
                    case 'first-quote':
                        Log::info('Problem Description: ' . $request->get('problem_desc'));
                        Log::info('Saving Additional Quote Info');
                        $additionalQtInfoResponseArray = $this->saveAdditionalQuoteInfo($request, $currentLoggedInUser);
                        if ($additionalQtInfoResponseArray['success'] == true) {
                            Log::info('Returned from saveAdditionalQuoteInfo() with true');
                            $data = [
                                "status"=> "OK",
                                "data"=> [
                                    "case" =>  'first-quote',
                                    "message" => trans('patient-dashboard.first-quote-after-registration'),
                                    "redirect_url" => route('patient.dashboard'),
                                    'data' => $additionalQtInfoResponseArray['data']
                                ]
                            ];
                            return response()->json($data, 200);
                        } else {
                            Log::info('Returned from saveAdditionalQuoteInfo() with false');
                            $errorObj = [
                                'error'=> [trans('patient-dashboard.first-quote-after-reg-failed')]
                            ];
                            $data = [
                                "status"=> "FAILED",
                                "data"=> [
                                    "case" =>  'first-quote',
                                    "message" => $errorObj['error'],
                                    "redirect_url" => '#'
                                ]
                            ];
                            return response()->json($data, 500);
                        }
                        break;
                    
                    default:
                        $data = [
                            "status"=> "OK",
                            "data"=> [
                                "message" => 'Not a first quote after registration case',
                                "redirect_url" => route('patient.dashboard')
                            ]
                        ];
                        return response()->json($data, 200);
                        break;
                }
            }
        } catch(\Exception $e) {
            Log::info('There was some exception in PatientController->showUserDasboard()');
            $data = [
                "status"=> "FAILED",
                "data"=> [
                    "message" => trans('patient-dashboard.first-quote-after-reg-failed'),
                    "redirect_url" => route('first.quote.submit')
                ]
            ];
            return response()->json($data);
        }
    }

    private function saveAdditionalQuoteInfo(Request $request, $user) {
        try {
            $jsonResponse = (new QuoteController)->updateFirstQuoteByUserEmail($request, $user->email);
            Log::info($jsonResponse->status());
            Log::info('$jsonResponse->content(): ');
            Log::info($jsonResponse->content());
            $responseArray = json_decode($jsonResponse->content(), true);
            /*if ($jsonResponse->status() == 200 && $responseArray['success'] == true) {
                Log::info('Great!!, Aditional Quote data saved successfuly');
                return true;
            } else {
                Log::info('Oops!!, Could not update additional quote data');
                return false;
            }*/
            return $responseArray;
        } catch (\Exception $e) {
            Log::info('There is some exception in PatientController->saveAdditionalQuoteInfo()');
            Log::info($e);
        }
    }

    public function resetPasswordRequest(Request $request)
    {
        $email = Auth::user()->email;
        Log::info('inside PatientController.passwordResetRequest()');
        (new LoginController)->patientUserLogoutWithNoRedirect();

        return redirect()->route('password.request',  ['email' => $email]);
            //->with('email' => $email);
    }

    private function isNewUserFirstQuote($quoteId) {
        $jsonResponse = (new QuoteController)->getQuoteById(new Request([]), $quoteId);
        $responseArray = json_decode($jsonResponse->content(), true);
        Log::info('created_at: ');
        Log::info($responseArray['data'][0]['d_o_s']);
        if ($responseArray['data'][0] && $responseArray['data'][0]['id'] == $quoteId) {
            $date   = new \DateTime(); //this returns the current date time
            $dateStr = $date->format('Y-m-d H:i:s');
            $quoteCreatedAtDateStr = $responseArray['data'][0]['d_o_s'];
            Log::info('$quoteCreatedAtDateStr: ' . $quoteCreatedAtDateStr);
            Log::info('$dateStr: ' . $dateStr);
            $timeFirst  = strtotime($quoteCreatedAtDateStr);
            $timeSecond = strtotime($dateStr);
            $differenceInSeconds = $timeSecond - $timeFirst;
            Log::info('$differenceInSeconds: ' . $differenceInSeconds);
            if ($differenceInSeconds < 60) {
               return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
        
    }
}
