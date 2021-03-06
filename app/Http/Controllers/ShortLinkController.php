<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
   
        return view('list', compact('shortLinks'));
    }
     

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('shortenLink');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
            'link' => 'required|unique:short_links,link|url',
        ],[
            'link.url'=>'Please Enter Proper URL Like http://www.example.com OR https://www.example.com'

        ]);

   
        $input['link'] = $request->link;
        $input['code'] = Str::random(5);


   
        ShortLink::create($input);
  
        return redirect('/')
             ->with('success', 'Shorten Link Generated Successfully!');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        $input['click_count'] = $find->click_count + 1;

        $find->update($input);

        return Redirect::to($find->link);
    }
}
