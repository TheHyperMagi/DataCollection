<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOrgs extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal_id',
        'user_id',
        'post_type',
        'last_name',
        'org_name',
        'org_type',
        'industry',
        'solution_product',
        'size_of_team',
        'website',
        'goal_relevance',
        'target_relevance',
        'target_population',
        'urban_rural',
        'regions',
        'country',
        'city',
        'year_of_establishment',
        'additional_info',
        'visuals',
        'key_pain_point',
    ];
}
