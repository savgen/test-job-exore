<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreateController extends Controller
{
    public function index(Request $request)
    {
        if(isset($_POST['create']))
        {
            $userID = Auth::user()->id;

            $validated = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    
            $employee = User::create([
                'manager_id' => $userID,
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
    
            $employee->assignRole('employee');

            return redirect('employees');
        }

        return view('employees.create-employee');
    }
}
