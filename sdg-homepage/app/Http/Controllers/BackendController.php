<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    function AdminDashboard(){
        $admin = User::where('type', 'ADM')->count();
        $can = User::where('type', 'CAN')->count();
        $emp = User::where('type', 'EMP')->count();
        $orgs = Organization::count();
        return view('backend.dashboard', compact('orgs', 'emp', 'can', 'admin'));
    }

    function EmployeeDashboard($name){
        $user = User::where('name', $name)->first();
        return view('backend.emp_deshboard', compact('user'));
    }

    function CandidateDashboard($name){
        $user = User::where('name', $name)->first();
        return view('backend.can_deshboard', compact('user'));
    }
}
