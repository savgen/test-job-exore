<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    public function index()
    {
        $userID = Auth::user()->id;

        $employees = User::select('id', 'email')
            ->where('manager_id', $userID)
            ->orderBy('id', 'DESC')
            ->get();

        return view('employees.all', [
            'employees' => $employees
        ]);
    }
}
