<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sounds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class SoundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $target = request()->target;
        $categories = Sounds::where('target', $target)
                            ->whereNull('parent_id')
                            ->get();
        return view("content.sounds.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
        return view("content.sounds.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => ['required']
			]);
		
		$facebook = 0;
		$yahala = 0;
		$tiktok = 0;
		$insta = 0;
		$twitter = 0;
		$yekbun = 0;
		
		if ($request->has('yekbun')) {
			$yekbun = 1;	
		}
		if ($request->has('yahala')) {
			$yahala = 1;	
		}
		if ($request->has('tiktok')) {
			$tiktok = 1;	
		}
		if ($request->has('facebook')) {
			$facebook = 1;	
		}
		if ($request->has('twitter')) {
			$twitter = 1;	
		}
		if ($request->has('insta')) {
			$insta = 1;	
		}
		
		
		$excat = Sounds::orderby('cnt', 'desc')->first();

        if($excat){

            if($excat->cnt > 100){
                $cnt = $excat->cnt;
                $cnt++;
            }else{
                $cnt = 101;
            }

        }else{
            $cnt = 101;
        }
		
		
		
		
		$category = new Sounds();
		
		$category->name = $request->cat_name;
		$category->is_yekbun = $yekbun;
		$category->is_yahala = $yahala;
		$category->is_facebook = $facebook;
		$category->is_tiktok = $tiktok;
		$category->is_insta = $insta;
		$category->is_twitter = $twitter;
		$category->cnt = $cnt;
        $category->status = 1;
		
		$category->save();
		return redirect('/sounds')->with('success','Intros successfully created.');

       
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
        $intro = Sounds::where('_id', $id)->first();
        if(!$intro){
            return back();
        }
        return view("content.sounds.edit", compact("intro"));
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
        $request->validate([
            'cat_name' => ['required']
			]);
		
		$facebook = 0;
		$yahala = 0;
		$tiktok = 0;
		$insta = 0;
		$twitter = 0;
		$yekbun = 0;
		
		if ($request->has('yekbun')) {
			$yekbun = 1;	
		}
		if ($request->has('yahala')) {
			$yahala = 1;	
		}
		if ($request->has('tiktok')) {
			$tiktok = 1;	
		}
		if ($request->has('facebook')) {
			$facebook = 1;	
		}
		if ($request->has('twitter')) {
			$twitter = 1;	
		}
		if ($request->has('insta')) {
			$insta = 1;	
		}
		
		
		
		
		$category = Sounds::where('_id', $id)->first();
		
		$category->name = $request->cat_name;
		$category->is_yekbun = $yekbun;
		$category->is_yahala = $yahala;
		$category->is_facebook = $facebook;
		$category->is_tiktok = $tiktok;
		$category->is_insta = $insta;
		$category->is_twitter = $twitter;
       
        $category->save();
        return redirect('/sounds')->with('success','Sounds successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function delcat($id){
		$category = Sounds::find($id);
		if ($category->image)
            Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Sound successfully deleted.");
	}
    public function destroy($id)
    {
        $category = Sounds::find($id);

        // Delete Image
        if ($category->image)
            Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Sound successfully deleted.");
    }
}