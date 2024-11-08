<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class IntrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $target = request()->target;
        $categories = Intros::where('target', $target)
                            ->whereNull('parent_id')
                            ->get();
        return view("content.intros.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
        return view("content.intros.create");
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
		
		
		$excat = Intros::orderby('cnt', 'desc')->first();

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
		
		
		
		
		$category = new Intros();
		
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
		return redirect('/intros')->with('success','Intros successfully created.');

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store("/categories", "public");
            $validated["image"] = $imagePath;
        }

        $category = Category::create($validated);

        return back()->with("success", "Category successfully created.");
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
        $intro = Intros::where('_id', $id)->first();
        if(!$intro){
            return back();
        }
        return view("content.intros.edit", compact("intro"));
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
		
		
		
		
		$category = Intros::where('_id', $id)->first();
		
		$category->name = $request->cat_name;
		$category->is_yekbun = $yekbun;
		$category->is_yahala = $yahala;
		$category->is_facebook = $facebook;
		$category->is_tiktok = $tiktok;
		$category->is_insta = $insta;
		$category->is_twitter = $twitter;
       
        $category->save();
        return redirect('/intros')->with('success','Intros successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function delcat($id){
		$category = Intros::find($id);
		if ($category->image)
            Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Intros successfully deleted.");
	}
    public function destroy($id)
    {
        $category = Intros::find($id);

        // Delete Image
        if ($category->image)
            Storage::delete($category->image);

        $category->delete();

        return back()->with("success", "Intro successfully deleted.");
    }
}