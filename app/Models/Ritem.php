<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Variant;
use App\Models\Roomserviceitems;
use App\Models\Addonassign;
use App\Models\Discount;
use Carbon\Carbon;

class Ritem extends Model
{
    use HasFactory;
    protected $table = 'ritems';
    public $timestamps = false;
    protected $fillable = [
        'name','rcat_id','components','notes','description','image','tax','qty','alert_qty','offer','special','price','op_rate','os_date','oe_date','oc_time','ri_menu','status','created_by','updated_by'
    ];

    public function addons()
    {
        return $this->hasMany(Addonassign::class, 'fooditem_id', 'id')->with('addon');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class, 'item_id', 'id')->where('status', 1); 
    }

    public function discounts()
    {
        return $this->hasOne(Discount::class, 'food_id', 'id')->whereDate('dt_date','>=',date('Y-m-d'))->where('status', 1); 
    }
    public function roomServices()
    {
        return $this->hasMany(Roomserviceitems::class, 'room_service_item_id', 'id'); 
    }

    public function discounts1()
    {
        return $this->hasOne(Discount::class, 'food_id', 'id')->whereDate('dt_date','>=',date('Y-m-d')); 
    }


    

    
   

   
    
}
