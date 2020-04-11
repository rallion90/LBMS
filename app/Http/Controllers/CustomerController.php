<?php

namespace App\Http\Controllers;

use App\Product;

use App\Category;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('customer.index');
    }

    

    

    

    

    

    

    

   

    
    

   

}
