<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class Rcategory extends Model
{
    use NodeTrait;
    protected $table = 'rcategories';
    public $timestamps = false;
    protected $fillable = [
        'name','p_name','p_id'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'p_name');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'p_name');
    }

    public function subcategories()
    {
        return $this->hasMany(Rcategory::class, 'p_name', 'name')->where('p_id','=',1); 
    }
}
