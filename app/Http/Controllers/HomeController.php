<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

//use App\Models\Website;

use App\Website;


//use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    //
     public function __construct() {
		$this->Website = new Website;
	 }	

    public function index(){    
		$ch = curl_init();

		$optArray = array(
		    CURLOPT_URL => 'http://45.79.111.106/interview.json',
		    CURLOPT_RETURNTRANSFER => true
		);

		curl_setopt_array($ch, $optArray);

		$result = curl_exec($ch);

	
		$object = json_decode($result, true);
		
		$data_count = $this->Website->getdata();

		$static = $this->Website->findata();
		if($data_count==0){


			foreach ($object as $key => $value) {
			
				$data_object = $value; 
				$insert_data = $this->Website->createData($data_object);
			}

		}	
		else{
			return view('dashboard',compact('static'));
		}
		
    	return view('dashboard',compact('static'));
    }

    public function SearchData(Request $request){
    	$input = $request->all();
    	dd($input);
    }
}
