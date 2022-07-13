<?php

namespace App\Http\Controllers\Web;

use App\CPU\Helpers;
use App\CPU\OrderManager;
use App\CPU\ProductManager;
use App\CPU\CartManager;
use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Brand;
use App\Model\BusinessSetting;
use App\Model\Category;
use App\Model\DealOfTheDay;
use App\Model\FlashDeal;
use App\Model\FlashDealProduct;
use App\Model\HelpTopic;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\Review;
use App\Model\Seller;
use App\Model\Shop;
use App\Model\Order;
use App\User;
use App\Model\Wishlist;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class DirectoryController extends Controller
{
    public function directory()
    {
        // echo "yes";
        $result['cities'] = DB::table('cities')->get();
        $result['profession'] = DB::table('profession')->get();
        return view('web-views.directory', $result);
    }
    
    public function form()
    {
        $result['cities'] = DB::table('cities')->get();
        $result['profession'] = DB::table('profession')->get();
        return view('web-views.service_provider_form', $result);
    }
    
    public function sp_details(Request $request)
    {
        $city = $request->city;
        $profession = $request->profession;
        $users['user'] = DB::table('service_providers')
                ->where('city', $city)
                ->where('profession', $profession)
                ->where('status', 1)
                ->get();
        return view('web-views.sp_details', $users);
    }
    
    public function insert_service_provider(Request $request)
    {
        // if ($request->hasfile('image')) {
        //     $image=$request->file('image');
        //     $ext=$image->extension();
        //     $image_name=time().'.'.$ext;
        //     $image->storeAs('public/sp_img', $image_name);
            //  $model->img=$image_name; 
        // }
             
        DB::table('service_providers')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'profession' => $request->profession,
            'img' => ImageManager::upload('sp_img/', 'png', $request->file('image')),
        ]);

        Toastr::success('Submited successfully!');
        return back();
    }
    


}
