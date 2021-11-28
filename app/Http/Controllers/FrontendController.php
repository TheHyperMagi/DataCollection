<?php

namespace App\Http\Controllers;

use App\Models\AddOrgs;
use App\Models\Category;
use App\Models\Organization;
use App\Models\User;
use Carbon\Carbon;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    function Index(){
        $goals = Category::orderBy('id', 'asc')->get();
        return view('frontend.index', compact('goals'));
    }

    function userRegister(Request $request){
        $request->validate([
            'email' => ['required', 'unique:users'],
        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request['password']),
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('login')->with('success', 'Registation Successful.');
    }


    function RelatedOrganizations($slug){

        $category = Category::where('slug', $slug)->get();
        foreach($category as $item){
            $goal = $item->id;
        }
        $orgs =  Organization::where('goal_id', $goal)->get();
        $user_posted = AddOrgs::where('post_type', 1)->where('goal_id', $goal)->get();
        return view('frontend.related_orgs', compact('orgs', 'user_posted'));
    }

    function OrgDetails($org_name){
        $org = Organization::where('org_name', $org_name)->first();
        return view('frontend.org_details', compact('org'));
    }

    function userposted($org_name){
        $org = AddOrgs::where('org_name', $org_name)->first();
        return view('frontend.posted_org_details', compact('org'));
    }

    //EMP Entry 

    function addorgs(){
        $user = User::where('name', Auth::user()->name)->first();
        $goals = Category::orderBy('id', 'asc')->get();
        return view('frontend.add_orgs', compact('user', 'goals'));
    }

    function postorgs(Request $request){
        
        $request->validate([
            'goal_id' => ['required'],
            'user_id' => ['required'],
            'org_name' => ['required'],
        ]);
        AddOrgs::insert([
            'goal_id' => $request->goal_id,
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'org_name' => $request->org_name,
            'org_type' => $request->org_type,
            'industry' => $request->industry,
            'solution_product' => $request->solution_product,
            'size_of_team' => $request->size_of_team,
            'website' => $request->website,
            'goal_relevance' => $request->goal_relevance,
            'target_relevance' => $request->target_relevance,
            'target_population' => $request->target_population,
            'urban_rural' => $request->urban_rural,
            'regions' => $request->regions,
            'country' => $request->country,
            'city' => $request->city,
            'year_of_establishment' => $request->year_of_establishment,
            'additional_info' => $request->additional_info,
            'visuals' => $request->visuals,
            'key_pain_point' => $request->key_pain_point,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Thank you. Your submittion will approve by Admin, It may take 24-48hours.');
    }

    function vieworgs(){
        $orgs = AddOrgs::where('user_id', Auth::user()->id)->get();
        $user = User::where('name', Auth::user()->name)->first();
        $goals = Category::orderBy('id', 'asc')->get();
        return view('frontend.view_orgs', compact('orgs', 'goals', 'user'));
    }

    function OrgOverview($org_name){
        $org = AddOrgs::where('user_id', Auth::user()->id)->first();
        $user = User::where('name', Auth::user()->name)->first();
        $goals = Category::orderBy('id', 'asc')->get();
        return view('frontend.org_overview', compact('org', 'user', 'goals'));
    }

    function EditInfo($org_name){
        $org = AddOrgs::where('org_name', $org_name)->first();
        $user = User::where('name', Auth::user()->name)->first();
        $goals = Category::orderBy('id', 'asc')->get();
        $cat = Category::where('id', $org->goal_id)->first();
        return view('frontend.edit_org_info', compact('org', 'user', 'goals', 'cat'));
    }

    function UpdateOrgInfo(Request $request){

        $id = $request->id;
        AddOrgs::where('id', $id)->update([
            'goal_id' => $request->goal_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'org_name' => $request->org_name,
            'org_type' => $request->org_type,
            'industry' => $request->industry,
            'solution_product' => $request->solution_product,
            'size_of_team' => $request->size_of_team,
            'website' => $request->website,
            'goal_relevance' => $request->goal_relevance,
            'target_relevance' => $request->target_relevance,
            'target_population' => $request->target_population,
            'urban_rural' => $request->urban_rural,
            'regions' => $request->regions,
            'country' => $request->country,
            'city' => $request->city,
            'year_of_establishment' => $request->year_of_establishment,
            'additional_info' => $request->additional_info,
            'visuals' => $request->visuals,
            'key_pain_point' => $request->key_pain_point,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success', 'Organization Details Updated Successfully.');
    }

    function DeleteOrgInfo($id){
        AddOrgs::findOrFail($id)->delete();
        return redirect()->route('vieworgs')->with('delete', 'Organization Deleted Successfully.');
    }
}
