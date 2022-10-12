<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use function get_default_lang;
use function response;
use function returnSuccessMessage;

class MainController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        $posts = Post::with('category')->paginate(10);
        return response() ->json(['success', '200', $posts]);

    }



    public function governorates()
    {
        $governorate = Governorate::where(function ($query){
            if (get_default_lang() === 'en'){
                $query->select('governorate_name_en')->get();
            } else {
                $query->select('governorate_name_ar')->get();
            }
        })->get();
        $response = returnSuccessMessage('success', '200', $governorate);
        return response() ->json($response);

    }

    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use($request){
            if ($request->has('governorate_id'))
            {
                if (get_default_lang() === 'en') {
                    $query->select('city_name_en')->where('governorate_id', $request->governorate_id);
                }else{
                    $query->select('city_name_ar')->where('governorate_id', $request->governorate_id);
                }
            }
        })->get();

        $response = returnSuccessMessage('success', '200', $cities);
        return response() ->json($response);

    }

    public function settings()
    {
        $settings = Setting::all();
        return response() ->json(['success', '200', $settings]);

    }

    public function categories()
    {
        $categories = Category::all();
        return response() ->json(['success', '200', $categories]);

    }

    public function bloodTypes()
    {
        $bloodTypes = BloodType::all();
        return response() ->json(['success', '200', $bloodTypes]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
