<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
    public function getCategory()
    {
        return $this->hasOne('App\Models\CompanyCategory', 'id', 'company_category_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
