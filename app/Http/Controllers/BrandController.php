<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index' , compact('brands'));
    }
}
