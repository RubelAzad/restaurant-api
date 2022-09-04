<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Reservation;
use App\Models\Employeetype;

class EmployeeController extends Controller
{
    /**
     * hotel
     *
     * @param  mixed $id
     * @return void
     */
    public function hotel($id)
    {
        // Get All products
        // get All Products From Database
        //$employees = Employee::all();
        $linksbycategories = Employee::select('customerinfo.customerid as customer_id','customerinfo.firstname as first_name','customerinfo.lastname as last_name','customerinfo.email','customerinfo.cust_phone','booked_info.room_no')
        ->join('customerinfo', 'booked_info.cutomerid', '=', 'customerinfo.customerid')
        ->where('bookingstatus','=',$id)
        ->get();
        return response()->json($linksbycategories);

    }
    /**
     * reservation
     *
     * @param  mixed $id
     * @return void
     */
    public function reservation($id)
    {
        // Get All products
        // get All Products From Database
        //$employees = Employee::all();
        $restaurants = Reservation::select('customerinfo.customerid as customer_id','customerinfo.firstname as first_name','customerinfo.lastname as last_name','customerinfo.email','customerinfo.cust_phone')
        ->where('restaurant_customer_type', '=', 6)->get();
        return response()->json($restaurants);

    }
    /**
     * walk
     *
     * @param  mixed $id
     * @return void
     */
    public function walk($id)
    {
        // Get All products
        // get All Products From Database
        //$employees = Employee::all();
        $restaurants = Reservation::select('customerinfo.customerid as customer_id','customerinfo.firstname as first_name','customerinfo.lastname as last_name','customerinfo.email','customerinfo.cust_phone')
        ->where('restaurant_customer_type', '=', 7)->get();
        return response()->json($restaurants);

    }
    /**
     * employeetype
     *
     * @return void
     */
    public function employeetype(){
        $employeetypes = Employeetype::select('emp_his_id','employee_id','first_name','middle_name','last_name','email','phone')
        ->where('pos_id','=', 3)
        ->get();
        return response()->json($employeetypes);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        // PUT(id)
        // Update Info by Id

        try {
            Reservation::create([
                'customernumber' => '0002',
                'firstname' => $request->first_name,
                'lastname' => $request->last_name,
                'email' => $request->email,
                'cust_phone' => $request->cust_phone,
                'restaurant_customer_type' => '6',
            ]);
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }

        return response('Record saved successfully.');

    }

}
