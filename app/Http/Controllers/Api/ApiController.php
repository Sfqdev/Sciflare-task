<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->input('name')) {
            return Organization::where("name", "=", $request->input('name'))->firstOrFail();
        }
        $organization = Organization::all();
        return $organization;
    }

    public function login(Request $request)
    {
        
        $organization = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        $result = '';
        if($organization){
            $user = Auth::user();
            $token = $user->createToken('mytoken')->accessToken;
            $result =[
                'status' => 'True',
                'message' => 'Login successfully',
                'token' => $token
            ];
        }else{
            $result =[
                'status' => 'false',
                'message' => 'User not found',
            ];
        }
        return $result;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'address' => 'required|min:5|max:255',
            'country' => 'required',
        ]);

        $result ="";
        if($validator->fails()){
            return $validator->errors();
        }else{
            $Organization = Organization::create([
                'name' => $request->input('name'),
                'category' => $request->input('category'),
                'address' => $request->input('address'),
                'country' => $request->input('country'),
            ]);
            if($Organization){
                $result = [
                    'status' => "True",
                    "Message" => "Data Successfully Created",
                ];
            }else{
                $result = [
                    'status' => "False",
                    "Message" => "Data not Created",
                ];
            }
        }

        return $result;
    }

    public function update(Request $request, $id)
    {
        $organization = Organization::find($id);

        if (!$organization) {
            return $result = [
                'message' => 'Data not found'
            ];
        }

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'category' => 'required|email',
        //     'address' => 'required|min:5|max:255',
        //     'country' => 'required',
        // ]);
        // if($validator->fails()){
        //     return $validator->errors();
        // }
        if($organization){
            $organization->update($request->all());
            $result = [
                'status' => 'True',
                'message' => 'Data updated',
            ];
        }else{
            $result = [
                'status' => 'False',
                'message' => 'Data failed',
            ];
        }

        return $result;
    }

    public function destroy(Request $request, $id)
    {
        $organization = Organization::find($id);

        if (!$organization) {
            return $result = [
                'error' => 'Record not found',
            ];
        }

        $remove =$organization->delete();
        if($remove){
            $result = [
                'status' => 'True',
                'message' => 'Data deleted successfully',
            ];
        }else{
            $result = [
                'status' => 'False',
                'message' => 'Data not deleted',
            ];
        }

        return $result;
    }

}
