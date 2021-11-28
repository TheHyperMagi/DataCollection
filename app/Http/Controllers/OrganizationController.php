<?php

namespace App\Http\Controllers;

use App\Models\AddOrgs;
use App\Models\Category;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrganizationController extends Controller
{
    function AddOrganizations(){
        $category = Category::orderBy('id', 'asc')->get();
        return view('backend.organization.add_organization', compact('category'));
    }

    function PostOrganizations(Request $request){
        $request->validate([
            'goal_id' => ['required'],
            'org_name' => ['required'],
        ]);
        Organization::insert([
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
            'created_at' => Carbon::now()
        ]); 
        return back()->with('success', 'Organization Created Successfully.');
    }

    function ViewOrganizations(){
        $orgs = Organization::orderBy('id', 'asc')->simplePaginate(15);
        foreach($orgs as $item){
            $id = $item->id;
        }
        $org = Organization::where('id', $id)->first();
        $goal_id =  Category::where('id', $org->goal_id)->first();
        return view('backend.organization.view_organization', compact('orgs', 'goal_id'));
    }

    function EditOrganizations($id){
        $category = Category::orderBy('id', 'asc')->get();
        $org = Organization::where('id', $id)->first();
        $goal_id =  Category::where('id', $org->goal_id)->first();
        return view('backend.organization.edit_organization', compact('org', 'category', 'goal_id'));
    }

    function UpdateOrganizations(Request $request){
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
        return back()->with('success', 'Organization Updated Successfully.');
    }

    function DeleteOrganizations($id){

        Organization::where('id', $id)->delete();
        return back()->with('success', 'Organization Deleted Successfully.');
    }
}