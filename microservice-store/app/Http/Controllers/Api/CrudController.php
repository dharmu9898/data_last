<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Crud;
class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        Log::info('yaha tak id  aa gaya'.$id);
        // $data = Crud::where('id',$id)->get();er
        $data = Crud::where('user_id',$id)->get();
        // Log::debug((array) $data);
      
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'data retrieved successfully.',
        ];
        // Log::info($response);
        // return $allcat;
        return response()->json($response, 200);
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
            Log::info('In Crud Controller');
            $input = $request->all();
        $request->validate([
            'full_name' => 'required',
            'address'  => 'required',
            // 'image'      => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);
        // $image = $request->file('image');
        // $new_name = read() . '.' . $image-getClientOriginalExtension();
        // $image->move(public_path('image'),$new_name);

        $data = new Crud;
            $data->full_name       = $request->full_name;
            $data->address      = $request->address;
            $data->user_id      = $request->user_auth_id;
            $data->user_email      = $request->user_email;
            // $data->image      = $new_name;
            $data->save();
            $response = [
                'success' => true,
                //'data' => $data,
                'data' => $data,
                'message' => 'Training Fetching successfully.'
            ];
            Log::info('validation ok');
            Log::info($data);
            return response()->json($response, 200);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editdata($id)
    {
        Log::info('editData ke pass id aaya: '. $id);
        $get_edit = Crud::where('id',$id)->first();
        Log::info('getEdit data : '. $get_edit);
        $response = [
            'success' => true,
            'data' => $get_edit,
            'message' => 'Successfully send data for Edit.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedata(Request $request)
    {
        {
            Log::info('In Crud Controller');
            
            $input = $request->all();
            Log::info('In Crud Controller input: '.print_r($input, true));
        $request->validate([
            'full_name' => 'required',
            'address'  => 'required',
            // 'image'      => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);
        // $image = $request->file('image');
        // $new_name = read() . '.' . $image-getClientOriginalExtension();
        // $image->move(public_path('image'),$new_name);
        $data = array(
            'full_name'       => $request->full_name,
            'address'      => $request->address,
          'user_id'      => $request->user_auth_id,
            'user_email'      => $request->user_email
            // $data->image      = $new_name;
        );
            $update_data = Crud::where('id', $input['id'])->update($data);

            $response = [
                'success' => true,
                //'data' => $data,
                'data' => $update_data,
                'message' => 'Training Fetching successfully.'
            ];
            Log::info('validation ok update');
            Log::info($data);
            return response()->json($response, 200);
    }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletedata($id)
    {
        {
            Log::info('delete Data ke pass id aaya: '. $id);
            $get_delete = Crud::where('id',$id)->delete();
            Log::info('delete getEdit data : '. $get_delete);
            $response = [
                'success' => true,
                'data' => $get_delete,
                'message' => 'Successfully Delete data for Edit.'
            ];
    
            return response()->json($response, 200);
        }
    }
}
