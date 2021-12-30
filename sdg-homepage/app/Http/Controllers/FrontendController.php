<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Organization;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function Index(){
        $goals = Category::orderBy('id', 'asc')->get();
        return view('frontend.index', compact('goals'));
    }


    function RelatedOrganizations($slug){

        $category = Category::where('slug', $slug)->get();
        foreach($category as $item){
            $goal = $item->id;
        }
        $orgs =  Organization::where('goal_id', $goal)->get();
        return view('frontend.related_orgs', compact('orgs'));
    }

    function OrgDetails($org_name){
        $org = Organization::where('org_name', $org_name)->first();
        return view('frontend.org_details', compact('org'));
    }
}
