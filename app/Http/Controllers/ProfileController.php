<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Auth;

class ProfileController extends Controller
{
    function __construct() {

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.profile',compact('user'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password'
        ]);

        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }

        $user = User::find($id);

        $data = [
            'old_data' => $user,
            'new_data' => $input,
            'type' => 'Update Profile'
        ];
        storeLogs($data);

        $user->update($input);

        return redirect()->route('users.index')->with('success','Profile updated successfully');
    }
}
