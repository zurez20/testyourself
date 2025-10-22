<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class AuthController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.auth.login');
            Session()->flash('alert-success', "Please login first");
        }
        return view('admin.auth.login');
    }

    public function checkUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ]);
        }

        $phone = $request->post('login');

        $result = User::where(['phone' => $phone])->whereNotIn('role', ['customer'])->first();

        $panelRoles = Role::where('panelFlag', 1)->pluck('slug')->toArray();

        if ($result) {
            if (in_array($result->role, $panelRoles)) {

                if ($result->status == 1 && $result->deleteId == 0) {
                    if (Hash::check($request->post('password'), $result->password)) {
                        Auth::login($result);
                        return response()->json([
                            'status' => 200,
                            'message' => 'Logged In Succesfully',
                        ]);
                    } else {
                        Session()->flash('alert-danger', 'Incorrect Password');
                        return response()->json([
                            'status' => 201,
                            'message' => 'Incorrect Password',
                        ]);
                    }
                } else if ($result->status != 1) {
                    return response()->json([
                        'status' => 204,
                        'message' => 'User Not active',
                    ]);
                } else if ($result->deleteId == 1) {
                    return response()->json([
                        'status' => 205,
                        'message' => 'User Deleted',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 203,
                    'message' => 'User Not Authorized',
                ]);
            }
        } else {
            return response()->json([
                'status' => 202,
                'message' => 'Invalid Details',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function showforget()
    {
        return view('admin.auth.forgetPassword');
    }

    public function forgetPassword(Request $request)
    {
        $roles = Role::where('panelFlag', 1)->pluck('slug')->toArray();
        $user = User::where('phone', $request->phone)->whereIn('role', $roles)->first();
        if ($user) {
            return response()->json(['status' => 201, 'message' => 'Phone number found']);
        } else {
            return response()->json(['status' => 200, 'message' => 'Phone number not found']);
        }
    }

    public function changepassword(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        $user->password = Hash::make($request->password);
        $user->update();

        return response()->json([
            'status' => 200,
            'message' => 'Password Changed Successfully',
        ]);
    }
}
