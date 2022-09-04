<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Ritem;
use App\Models\Rcategory;
use App\Models\Addons;
use App\Models\Variant;
use App\Models\Addonassign;
use App\Models\Roomserviceitems;

class RitemController extends Controller
{
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        // GET(id)
        // show each product by its ID from database
        $items = Ritem::select('id', 'name as product_name', 'image as item_image', 'price', 'description', 'special as featured')->where('rcat_id', $id)->get();
        return response()->json($items);
    }
    public function catIdWiseItemWithRoomServiceItem($id)
    {
        // GET(id)
        // show each product by its ID from database
        $items = DB::table('ritems')
            ->select('ritems.id', 'ritems.name as product_name', 'ritems.image as item_image', 'ritems.price', 'ritems.description', 'ritems.special as featured', 'roomitems.room_service_item_id', 'roomitems.room_service_extra_price')
            ->leftJoin('roomitems', 'ritems.id', '=', 'roomitems.room_service_item_id')
            ->whereNotNull('roomitems.room_service_item_id')
            ->where('rcat_id', $id)
            
            //->where('ritems.id','=','roomitems.room_service_item_id')
            ->get();
        return response()->json($items);
    }

    /**
     * itemshow
     *
     * @param  mixed $id
     * @return void
     */
    public function itemshow($id)
    {
        $addon = Ritem::with('discounts', 'variants', 'addons')->where('id', '=', $id)
            ->select('id', 'name as item_name', 'components', 'notes', 'description', 'image as item_image', 'tax', 'qty', 'alert_qty', 'offer', 'special as featured', 'price', 'op_rate', 'os_date', 'oe_date', 'oc_time', 'ri_menu', 'status')
            ->get();


        return $addon;
    }

    public function itemIdWiseRoomServiceItem($id)
    {

        $addon = Ritem::with('discounts', 'variants', 'addons','roomServices')->where('id', '=', $id)
            ->select('id', 'name as item_name', 'components', 'notes', 'description', 'image as item_image', 'tax', 'qty', 'alert_qty', 'offer', 'special as featured', 'price', 'op_rate', 'os_date', 'oe_date', 'oc_time', 'ri_menu', 'status')
            ->get();

        
        /* $extraPrice = Ritem::first()->roomServices;
        $addon = [];
        $multiplied = $extraPrice->map(function ($item, $key) {
            $addon['room_service_extra_price'] = $item->room_service_extra_price;
        });

        $multiplied->all(); */





        return $addon;
    }

    public function itemWiseRoomServicePrice()
    {
        $roomServiceItemsPrice = Roomserviceitems::select('room_service_item_id', 'room_service_extra_price')->get();
        return response()->json($roomServiceItemsPrice);
    }
    /**
     * menu
     *
     * @param  mixed $id
     * @return void
     */
    /**
     * menu
     *
     * @param  mixed $id
     * @return void
     */
    public function menu($id)
    {


        $data = Ritem::select('id', 'name as item_name', 'components', 'notes', 'description', 'image as item_image', 'tax', 'qty', 'alert_qty', 'offer', 'special as featured', 'price', 'op_rate', 'os_date', 'oe_date', 'oc_time', 'ri_menu', 'status')->get();

        $arr = [];
        foreach ($data as $value) {
            $riMenu = $value->ri_menu;
            $splittedArray = explode(',', $riMenu);
            foreach ($splittedArray as $splittedValue) {
                if (strtolower($splittedValue) === strtolower($id)) {
                    $arr[] = ([
                        'id' => $value->id,
                        'food_name' => $value->item_name,
                    ]);
                } else {
                }
            }
        }

        return $arr;
    }
}
