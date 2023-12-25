<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($id = null)
    {
        if($id != null){
            $organization = User::where('organization_id','=', $id)->get();
            $data =[
                'title' => 'Users',
                'users' => $organization,
            ];
        }else{
            $data =[
                'title' => 'Users',
                'users' => User::all()
            ];
        }
        return view('users.index', $data);
    }

    public function edit(User $user, Role $role)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => $role->all()->sortBy("user_id"),
            'organizations' => Organization::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email',
            'organization_id' => 'required',
            'role' => 'required',
        ]);

        if($validatedData){
            $user = User::find($id);
            $update = $user->update($request->all());
            $result = [
                'status' => "True",
                'message' => 'Data successfully updated',
            ];
        }else{
            return $result = $validatedData->errors();
        }

        return redirect('/users');
    }

    public function profile()
    {
        if(!auth()->user()){
            abort(403, 'Unauthorized action.');
        }
        $userid = auth()->user()->id;
        $user = DB::table('users')
        ->join('organization', 'users.organization_id', '=', 'organization.id')
        ->where('users.id', '=', $userid)
        ->select('users.name as username', 'users.role','organization.*')
        ->get()->first();
        return view('profile.index', [
            'profile' => $user,
        ]);
    }
}
