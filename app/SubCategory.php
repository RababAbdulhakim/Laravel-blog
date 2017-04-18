<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $table = "SubCategory";
    public $fillable = ['SubCategory' ,'category_id'];
    public function Category()
{
    return $this->belongsTo('\App\Category');
}

 public function posts()
{
    return $this->hasMany('\App\Posts');
}

}
