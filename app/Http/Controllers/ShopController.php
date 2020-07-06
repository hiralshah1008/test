<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MobileApiController;

use App\User;

use Validator;
use App;
use DB;
use File;
use Input;
use Auth;
use Session;
use Log;
use Response;
use Image;
use Mail;
use Redirect;

use Illuminate\Support\Facades\config;

class ShopController extends Controller
{
    /**
     * Add the coffee shop.
     *
     * 
     * @return View
     */
    const timePicker = [
        '12:00AM' => '12:00 AM (Midnight)',
        '01:00AM' => '01:00 AM',
        '02:00AM' => '02:00 AM',
        "03:00AM" => '03:00 AM',
        '04:00AM' => '04:00 AM',
        '05:00AM' => '05:00 AM',
        '06:00AM' => '06:00 AM',
        '07:00AM' => '07:00 AM',
        '08:00AM' => '08:00 AM',
        '09:00AM' => '09:00 AM',
        '10:00AM' => '10:00 AM',
        '11:00AM' => '11:00 AM',
        '12:00PM' => '12:00 PM (Noon)',
        '01:00PM' => '01:00 PM',
        '02:00PM' => '02:00 PM',
        '03:00PM' => '03:00 PM',
        '04:00PM' => '04:00 PM',
        '05:00PM' => '05:00 PM',
        '06:00PM' => '06:00 PM',
        '07:00PM' => '07:00 PM',
        '08:00PM' => '08:00 PM',
        '09:00PM' => '09:00 PM',
        '10:00PM' => '10:00 PM',
        '11:00PM' => '11:00PM'
         ];
  const states = [
    'AL' => 'Alabama',
    'AK' => 'Alaska',
    'AZ' => 'Arizona',
    'AR' => 'Arkansas',
    'CA' => 'California',
    'CO' => 'Colorado',
    'CT' => 'Connecticut',
    'DE' => 'Delaware',
    'DC' => 'District Of Columbia',
    'FL' => 'Florida',
    'GA' => 'Georgia',
    'HI' => 'Hawaii',
    'ID' => 'Idaho',
    'IL' => 'Illinois',
    'IN' => 'Indiana',
    'IA' => 'Iowa',
    'KS' => 'Kansas',
    'KY' => 'Kentucky',
    'LA' => 'Louisiana',
    'ME' => 'Maine',
    'MD' => 'Maryland',
    'MA' => 'Massachusetts',
    'MI' => 'Michigan',
    'MN' => 'Minnesota',
    'MS' => 'Mississippi',
    'MO' => 'Missouri',
    'MT' => 'Montana',
    'NE' => 'Nebraska',
    'NV' => 'Nevada',
    'NH' => 'New Hampshire',
    'NJ' => 'New Jersey',
    'NM' => 'New Mexico',
    'NY' => 'New York',
    'NC' => 'North Carolina',
    'ND' => 'North Dakota',
    'OH' => 'Ohio',
    'OK' => 'Oklahoma',
    'OR' => 'Oregon',
    'PA' => 'Pennsylvania',
    'RI' => 'Rhode Island',
    'SC' => 'South Carolina',
    'SD' => 'South Dakota',
    'TN' => 'Tennessee',
    'TX' => 'Texas',
    'UT' => 'Utah',
    'VT' => 'Vermont',
    'VA' => 'Virginia',
    'WA' => 'Washington',
    'WV' => 'West Virginia',
    'WI' => 'Wisconsin',
    'WY' => 'Wyoming',
  ];
  
  /* Function to Add Shop */
    public function addShop(Request $request, $id = '')
    {
        $states = self::states;
        $timePicker = self::timePicker;
       
        //form is posted
        if($request->input('submit') != '' || $request->input('submit') == 1){
           // dd($request->all());
            //start server side validation
            $rules= array();
            $messages= array();
            
           
            /*foreach($request->input('day_status') as $day=>$value){
                if($value == 'closed'){
                  
                    $request->input('time')[$day] = "";
                }
            }*/

            //start server side validation
            foreach( $request->all() as $k=>$v){      
                if($k == 'time'){
                foreach($v as $day=>$time)
                {
                    if($time[0] != '12:00AM' && $time[1] != '12:00AM'){
                        $rules[$k.'.'.$day.'.0'] = 'date_format:h:iA';
                        $rules[$k.'.'.$day.'.1'] = 'after:'.$k.".".$day.'.0|date_format:h:iA';
                        $messages[$k.'.'.$day.'.1.after'] = 'Please enter correct end time for '.$day.'! End time must be greater than the start time!';
                    }
                }
                }elseif($k == 'shop_name'){
                    $rules[$k] = 'required';
					$messages[$k.'.required'] = 'Please enter the shop name'; 
                }elseif($k == 'shop_add1'){
                    $rules[$k] = 'required';
					$messages[$k.'.required'] = 'Please enter the shop address line 1'; 
                }elseif($k == 'shop_city'){
                    $rules[$k] = 'required';
					$messages[$k.'.required'] = 'Please enter the city'; 
                }elseif($k == 'shop_state'){
                    $rules[$k] = 'required';
					$messages[$k.'.required'] = 'Please enter the state'; 
                }elseif($k == 'shop_zipcode'){
                    $rules[$k] = 'required';
					$messages[$k.'.required'] = 'Please enter the shop Zip Code'; 
                } elseif($k == 'shop_status'){
                    $rules[$k] = 'required';
					$messages[$k.'.required'] = 'Please select shop status'; 
                } elseif($k == 'shop_image') {
                    $rules[$k] = 'image|mimes:jpeg,png,jpg,gif,svg';
                    $messages[$k.'.required'] = 'Please select proper image format'; 
                }   
            }
           
            
            $validator = Validator::make($request->all(),  $rules,$messages);
            if ($validator->fails()) {
               return \Redirect::back()->withInput()->withErrors($validator);
            }
            //end server side validation
            $destinationPath = '';
            if ($request->hasFile('shop_image')) {
                $destinationPath = $request->file('shop_image')->store('shopimages');
            }
            $hours = json_encode($request->all('time'));
            
            DB::enableQueryLog();
            //insert shop
            DB::table('shop')->insert(
                ['shop_name' => $request->input('shop_name'), 
                'shop_image' => $destinationPath,
                'shop_add1' => $request->input('shop_add1'),
                'shop_add2' => $request->input('shop_add2'), 
                'shop_city' => $request->input('shop_city'), 
                'shop_state' => $request->input('shop_state'), 
                'shop_zip' => $request->input('shop_zipcode'), 
                'shop_status' => $request->input('shop_status'), 
                'created_at' => now(), 
                'modified_at' => now(),
                'shop_hour'=> $hours
                ]
            );
            $q = DB::getQueryLog();

            return view('shop.addShop',compact('states','timePicker'))->withSuccess('Shop added succssfully!');
        }
        
        return view('shop.addShop',compact('states','timePicker'));
    }

    //function to add menu item for shop menu
    public function addMenu(Request $request, $shop_id){
        if($shop_id == "" || !is_numeric($shop_id)){
            return false;
        }
        $shop = DB::table('shop')->select('*')->where('id', '=', $shop_id)->get();
        
        $categories = DB::table('shop_food_category')->select('*')->where('cat_status', '=','Y')->get();
        $ingredients = DB::table('ingredients')->select('*')->where('ingredient_status', '=','Y')->get();
        
        if($request->input('submit') != '' || $request->input('submit') == 1){
            $item_ingredient = implode(",",$request->input('item_ingredient'));
            $destinationPath = '';
            if ($request->hasFile('item_image')) {
                 $destinationPath = $request->file('item_image')->store('itemimages');
             }
             DB::table('shop_menu')->insert(
                [
                'cid' => $request->input('item_categoy'), 
                'sid' => $shop[0]->id,
                'item_ingredients' => $item_ingredient,
                'item_name' => $request->input('item_name'), 
                'item_image' => $destinationPath, 
                'item_price' =>  $request->input('item_price'),  
                'item_desc' => $request->input('item_desc'), 
                'item_status' => $request->input('item_status'), 
                'created_at' => now(), 
                'modified_at' => now()
                ]
            );

             return redirect()->back()->withSuccess('Menu Item Added Successfully to your shop');
             
            
        }

        return view('shop.addMenu',compact('shop','categories','ingredients'));
    }

    //function to list shop based on filter provided
    public function getAllShop($limit = null, $sortBy = null, $status = null){
        
        $shops = DB::table('shop')->select('*')->where('shop_status','O');
        if(is_numeric($limit) && $limit > 0 ){
            $shops->limit($limit);
        }
        if($sortBy != '' && ($sortBy == 'Asc' || $sortBy == 'Desc')){
            $shops->orderBy('shop_name', $sortBy);    
        }
        
        $allShop = $shops->get();

        if($status == 'ON' || $status == 'CN'){
            $today = strtolower(date('l'));
            date_default_timezone_set('America/Los_Angeles');

            foreach($allShop as $k=>$v){
                $hours = json_decode($v->shop_hour, true);
                $today_working_from = strtotime(date('Y-m-d')." ".$hours['time'][$today][0]);
                $today_working_to = strtotime(date('Y-m-d')." ".$hours['time'][$today][1]);
                $currentTimestamp = strtotime(date('Y-m-d h:iA'));
                
                //$currentTimestamp = strtotime(date('Y-m-d')." 09:00PM");
               if($status == 'ON' && ($currentTimestamp < $today_working_from || $currentTimestamp > $today_working_to)){
                    $allShop->forget($k);
                }elseif($status == 'CN' && $currentTimestamp >= $today_working_from && $currentTimestamp <= $today_working_to){
                    $allShop->forget($k);
                }
            }
        }
       
        return response()->json([
            'status' => true,
            'shopList' => $allShop
        ], 200);
    }

    //function to fetch shop details with menu
    public function fetchShopDetail($shop_id){

        if(!is_numeric($shop_id)){
            return redirect("/");
        }
        //Fetch shop details
        $shop = DB::table('shop')
                ->where('shop.id', '=', $shop_id)
                ->get();

        if(empty($shop) || count($shop) == 0){
            return redirect("/");
        }
        if(!empty($shop)){
            $today = strtolower(date('l'));
            $workingHour = json_decode($shop[0]->shop_hour, true);
            if($workingHour['time'][$today][0] == '12:00AM' && $workingHour['time'][$today][1] == '12:00AM'){
                $todaysHours = " Closed ";
            }else{
                $todaysHours =  $workingHour['time'][$today][0] ." - ". $workingHour['time'][$today][1];

            }
            $shop[0]->todaysHours = $todaysHours;
            $shop = $shop[0];
        }        
        
       
        //Get Menu Item List
        $shop_menu = DB::table('shop_menu')
        ->join('shop_food_category','shop_menu.cid', '=', 'shop_food_category.id')
        ->where('shop_menu.sid', '=', $shop_id)
        ->select('shop_menu.*','shop_food_category.cat_name'
        )
        ->get();

        foreach($shop_menu as $k=>$v){
            $sql = "select GROUP_CONCAT(i.ingredient_name) as ingredient_name from ingredients as i where i.id IN (".$v->item_ingredients.")";

            $shop_ingredients = DB::select(DB::raw($sql));
            
            $v->ingredients =  $shop_ingredients[0]->ingredient_name;

            $shop_array[$v->cat_name][] = $v;
        }
        return view('shop.shopDetail',compact('shop_array','shop'));
    }
    
}