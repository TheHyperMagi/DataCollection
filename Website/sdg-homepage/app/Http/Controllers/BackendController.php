<?php

namespace App\Http\Controllers;

use App\Models\AddOrgs;
use App\Models\Category;
use App\Models\Organization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
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
        $goals = Category::orderBy('id', 'asc')->get();
        $orgs = Organization::latest()->take(7)->get();
        return view('frontend.user_deshboard', compact('user', 'goals', 'orgs'));
    }

    function EditInfo($email){
        $user = User::where('email', $email)->first();
        $goals = Category::orderBy('id', 'asc')->get();
        return view('frontend.edit_info', compact('user', 'goals'));
    }

    function updateinfo(Request $request){
        $id = $request->id;
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success', 'Profile Picture Changes!');
    }

    function UpdatePhoto(Request $request){
        $id = $request->id;

        if ($request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');
            
            $old_image = User::findOrFail($id)->profile_photo;

            $ext = Str::lower(Str::random(7)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnails/' . $ext));

            User::where('id', $id)->update([
                'profile_photo' => $ext,
                'updated_at' => Carbon::now()
            ]);
        } 

        return back()->with('success', 'Profile Picture Changes!');
        
    }

    function UserProfile($email){
        $goals = Category::orderBy('id', 'asc')->get();
        $user = User::where('email', $email)->first();
        return view('frontend.profile', compact('user', 'goals'));
    }

    // USER POSTED
    function userpostedorgs(){
        $posted_orgs = AddOrgs::latest()->get();
        
        return view('backend.user_posted_orgs', compact('posted_orgs'));
    }

    function userpostedorg($id){
        $org = AddOrgs::where('id', $id)->first();
        return view('backend.user_posted_org', compact('org'));
    }

    function changeStatus(Request $request){
        $id = $request->id;
        AddOrgs::where('id', $id)->update([
            'post_type' => $request->post_type,
            'updated_at' => Carbon::now() 
        ]);
        return back()->with('success', 'Post Status Updated.');
    }

    function DeletePostedOrg($id){
        AddOrgs::findOrFail($id)->delete();
        return redirect()->route('userpostedorgs')->with('delete', 'Post Declined.');
    }


    // USER LIST

    function AdminList(){
        $admins = User::where('type', 'ADM')->simplePaginate();
        return view('backend.users.admin_list', compact('admins'));
    }

    function EmployeeList(){
        $employee = User::where('type', 'EMP')->simplePaginate();
        return view('backend.users.employee_list', compact('employee'));
    }

    function CandidateList(){
        $candidate = User::where('type', 'CAN')->simplePaginate();
        return view('backend.users.candidate_list', compact('candidate'));
    }

    function UpdateUserType(Request $request){
        
        $id = $request->id;
        User::where('id', $id)->update([
            'type' => $request->type,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success', 'User Role Updated.');
    }

    function DeleteUser($id){
        User::where('id', $id)->delete();
        return back()->with('delete', 'User Entry Deleted');
    }
}
