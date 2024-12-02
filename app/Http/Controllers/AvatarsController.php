<?php

namespace App\Http\Controllers;

use App\Models\Avatars;
use App\Models\Avatars_sources;
use App\Models\Avatars_Feed;
use Illuminate\Http\Request;
use App\Models\Language;
use Carbon\Carbon;
use DateTime;
use Auth;

class AvatarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //f

		if(isset($_GET["delfeedfortest"]) && $_GET["delfeedfortest"] == "test1"){
			Avatars_Feed::truncate();
		}

		$avatars =  Avatars::orderBy('created_at', 'desc')
				->take(10)
				->get();



		return view('content.avatars.avatars_list', [
			'avatars' => $avatars
		]);
    }


	

	public function manag_avatars($id = 0){

		$avatars =  Avatars::orderBy('created_at', 'desc')->get();

		if(count($avatars) == 0){
			return redirect()->route('avatars.index')->with('success','No Avatar is there.');
		}

		return view('content.avatars.manag_avatars', [
			'avatars' => $avatars, 'id' => $id
		]);

	}

	public function testavatar(){
		return view('content.avatars.test');
	}

	public function get_avatars($id){
		$avatar =  Avatars::where('_id', $id)->first();
		$avatar->feeds = "13k";
		$avatar->like = "11k";
		$avatar->follower = "12k";
		$avatar->joindate = date("d m Y", strtotime($avatar->created_at));

		$to = \Carbon\Carbon::parse($avatar->created_at);
		$from = \Carbon\Carbon::parse(time());

		$diff = $to->diff($from);

		$years = $diff->y;
		$months = $diff->m;
		$days = $diff->d;

		if($years > 0){
			$avatar->days = $years . " Years - " . $months . " Months - " . $days . " Days";
		}else if($months > 0){
			$avatar->days = $months . " Months - " . $days . " Days";
		}else{
			$avatar->days = $days . " Days";
		}

		$feeds = Avatars_Feed::where('avatar_Id', $avatar->av_Id)->where('online', '!=', 1)->orderby('created_at', 'desc')->take(10)->get();
		$online_feeds = Avatars_Feed::where('avatar_Id', $avatar->av_Id)->where('online', 1)->orderby('online_time', 'desc')->take(10)->get(); 

		$trec = count($feeds);

		$times = array();

		for($i=0; $i<$trec; $i++){
			if($i == 0){
				$times[] = "02:40";
			}else if($i == 1){
				$times[] = "04:0" . rand(1,9);
			}else if($i==3){
				$times[] = "06:0" . rand(1,9);
			}else{
				$times[] = "0". $i + 6 .":3" . rand(1,9);
			}
			
		}

		
		//calculate time for next feed
		$working_days = $avatar->working_days;
		$working_hours = $avatar->working_hours;

		$current_hr = date("H", time());

		$feed_next = "";
		$remainingTime = "";
		$currentDateTime = Carbon::now();

		if($working_days == "Every Day"){
			//feed daily so only call next feed time

			if($working_hours > $current_hr){
				//today next time
				$feed_next = date("d.m.Y - " . $working_hours . ":" . rand(10,59));
				$chktime = date("d.m.Y " . $working_hours . ":" . rand(10,59));
			}else{
				//next day time
				$feed_next = date("d.m.Y - " . $working_hours . ":" . rand(10,59), time() + 86400);
				$chktime = date("d.m.Y " . $working_hours . ":" . rand(10,59), time() + 86400);
			}


			$endDateTime = Carbon::parse(date("d.m.Y H:i", time()));
			$startDateTime = Carbon::parse(date("d.m.Y H:i", strtotime($chktime)));

			// Calculate the time difference in various units
			$diffInMinutes = $startDateTime->diffInMinutes($endDateTime);
			$diffInHours = $startDateTime->diffInHours($endDateTime);
			$diffInDays = $startDateTime->diffInDays($endDateTime);
			$diffHumanReadable = $startDateTime->diffForHumans($endDateTime); // Human readable string
			//if($diffInDays > 0){
			//	$remainingTime = $diffInDays . ":" . $diffInMinutes - ($diffInHours * 60);
			//}else{
				$remainingTime = $diffInHours . ":" . $diffInMinutes - ($diffInHours * 60);
			//}


		}else{
			//feed on specific day so check and find next feed time

			$dbDay = $working_days; // Day column in your database (e.g., 'Monday')
			$dbTime = $working_hours; // Hour column in your database (e.g., '14:30')

			// Convert the 'day' from the database to a Carbon instance
			$targetDayOfWeek = Carbon::parse($dbDay)->dayOfWeek; // Get day of the week index (e.g., 1 for Monday)

			// Create a Carbon instance of the target time on the target day
			$targetDateTime = Carbon::now()->next($targetDayOfWeek)->setTimeFromTimeString($dbTime);

			// If the target time is before the current time, move to the next week
			if ($targetDateTime->lt($currentDateTime)) {
				$targetDateTime->addWeek();
			}

			$feed_next = date("d.m.Y - H:i", strtotime($targetDateTime->toDateTimeString()));

			$remainingTime = $targetDateTime->diffForHumans($currentDateTime, [
				'parts' => 3, // Limit to 3 units (e.g., "2 days 4 hours 30 minutes")
				'short' => true, // Shorten the output (optional)
			]);

			$remainingTime = str_replace("after", "", $remainingTime);

		}


		$avatar->feeds = $feeds;
		$avatar->online_feeds = $online_feeds;
		$avatar->nextime = $feed_next;
		$avatar->remtime = $remainingTime;
		$avatar->times = $times;

		echo json_encode($avatar);
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

		$languages = Language::all();


		//$avatar = new Avatars();
		//$avatar->name = 'ali hassan';
		//$avatar->av_Id = 'Ahs_342';
		//$avatar->status = 1;
		//$avatar->save();
		return view('content.avatars.avatars_add', ['languages' => $languages]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

			$imgfilename = "";

          if ($request->hasFile('dp')) {
				$randomize = rand(111111, 999999);
				$extension = $request->file('dp')->extension();
				$filename = $randomize . '.' . $extension;
				$image = $request->file('dp')->move('public/images/', $filename);
				$imgfilename = $filename;
			}







		$name = $request['avatar_name'];
		$avatar_task = $request['avatar_task'];
		$avatar_days = $request['avatar_days'];
		$avatar_hours = $request['avatar_hours'];
		$aricle_per_day = $request['aricle_per_day'];
		$feed_per_hour = $request['feed_per_hour'];
		

		$permission = $request['permissions'];


		$app_yek_allow = 0;
		$app_yek_keeponline = 0;
		if(isset($request['app_login1'])){
			$app_yek_allow = 1;
		}
		$app_yek_title = $request["media_1"];
		$app_yek_name = $request["username_1"];
		$app_yek_pass = $request["pass_1"];
		if(isset($request['keep_online_1'])){
			$app_yek_keeponline = 1;
		}
		$app_yek_logout = $request["logout_time_1"];

		$app_yahla_allow = 0;
		$app_yahla_keeponline = 0;
		if(isset($request['app_login2'])){
			$app_yahla_allow = 1;
		}
		$app_yahla_title = $request["media_2"];
		$app_yahla_name = $request["username_2"];
		$app_yahla_pass = $request["pass_2"];
		if(isset($request['keep_online_2'])){
			$app_yahla_keeponline = 1;
		}
		$app_yahla_logout = $request["logout_time_2"];

		$app_facebook_allow = 0;
		$app_facebook_keeponline = 0;
		if(isset($request['app_login3'])){
			$app_facebook_allow = 1;
		}
		$app_facebook_title = $request["media_3"];
		$app_facebook_name = $request["username_3"];
		$app_facebook_pass = $request["pass_3"];
		if(isset($request['keep_online_3'])){
			$app_facebook_keeponline = 1;
		}
		$app_facebook_logout = $request["logout_time_3"];

		$app_tik_allow = 0;
		$app_tik_keeponline = 0;
		if(isset($request['app_login4'])){
			$app_tik_allow = 1;
		}
		$app_tik_title = $request["media_4"];
		$app_tik_name = $request["username_4"];
		$app_tik_pass = $request["pass_4"];
		if(isset($request['keep_online_4'])){
			$app_tik_keeponline = 1;
		}
		$app_tik_logout = $request["logout_time_4"];

		$app_insta_allow = 0;
		$app_insta_keeponline = 0;
		if(isset($request['app_login5'])){
			$app_insta_allow = 1;
		}
		$app_insta_title = $request["media_5"];
		$app_insta_name = $request["username_5"];
		$app_insta_pass = $request["pass_5"];
		if(isset($request['keep_online_5'])){
			$app_insta_keeponline = 1;
		}
		$app_insta_logout = $request["logout_time_5"];


		$language = $request['select_lang'];
		$translate_lang = $request['translate_lang'];

		

		$source_link = $request['source_link'];


		$avid = "";

		$names = explode(" ", $name);
		if(count($names) > 2){
			$avid = $names[0][0].$names[1][0].$names[2][0];
		}else if(count($names) > 1){
			$avid = $names[0][0].$names[0][1].$names[1][0];
		}else{
			$avid = $names[0][0].$names[0][1].$names[0][2];
		}

		$avid .= "_".rand(111,999);

		$avcat = $request["avatar_category"];
 
		$avatar = new Avatars();
		$avatar->name = $name;
		$avatar->av_Id = $avid;
		$avatar->status = 1;
		$avatar->task = $avatar_task;
		$avatar->working_days = $avatar_days;
		$avatar->working_hours = $avatar_hours;
		$avatar->articles_day = $aricle_per_day;
		$avatar->articles_hours = $feed_per_hour;
		//$avatar->sharing_option = $sharing_options;
		//$avatar->reaction_option_text = $text_comments;
		$avatar->image = $imgfilename;
		//$avatar->image_setting = $image_settings;
		//$avatar->image_setting_content_type = $image_settings_1;
		//$avatar->image_setting_content_type2 = $image_settings_2;
		//$avatar->reaction_option_like = $like_post;
		//$avatar->reaction_option_post = $share_post;
		//$avatar->reaction_option_voice = $voice_comments;
		$avatar->select_lang = $language;
		$avatar->translate_lang = $translate_lang;
		$avatar->category = $avcat;

		$avatar->permission = $permission;

		$avatar->app_yek_alow = $app_yek_allow;
		$avatar->app_yek_title = $app_yek_title;
		$avatar->app_yek_name = $app_yek_name;
		$avatar->app_yek_pass = $app_yek_pass;
		$avatar->app_yek_keeplogin = $app_yek_keeponline;
		$avatar->app_yek_logout = $app_yek_logout;

		$avatar->app_yahla_allow = $app_yahla_allow;
		$avatar->app_yahla_title = $app_yahla_title;
		$avatar->app_yahla_name = $app_yahla_name;
		$avatar->app_yahla_pass = $app_yahla_pass;
		$avatar->app_yahla_keeponline = $app_yahla_keeponline;
		$avatar->app_yahla_logout = $app_yahla_logout;

		$avatar->app_facebook_allow = $app_facebook_allow;
		$avatar->app_facebook_title = $app_facebook_title;
		$avatar->app_facebook_name = $app_facebook_name;
		$avatar->app_facebook_pass = $app_facebook_pass;
		$avatar->app_facebook_keeponline = $app_facebook_keeponline;
		$avatar->app_facebook_logout = $app_facebook_logout;

		$avatar->app_tik_allow = $app_tik_allow;
		$avatar->app_tik_title = $app_tik_title;
		$avatar->app_tik_name = $app_tik_name;
		$avatar->app_tik_pass = $app_tik_pass;
		$avatar->app_tik_keeponline = $app_tik_keeponline;
		$avatar->app_tik_logout = $app_tik_logout;

		$avatar->app_insta_allow = $app_insta_allow;
		$avatar->app_insta_title = $app_insta_title;
		$avatar->app_insta_name = $app_insta_name;
		$avatar->app_insta_pass = $app_insta_pass;
		$avatar->app_insta_keeponline = $app_insta_keeponline;
		$avatar->app_insta_logout = $app_insta_logout;
		


		$avatar->save();

		$avid = $avatar->id;

		foreach($source_link as $link){
			if($link != ""){
				$source = new Avatars_sources();
				$source->avatar_Id = $avid;
				$source->source_link = $link;
				$source->save();
			}

		}

		return redirect()->route('avatars.index')->with('success','Avatar added successfully.');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
{
    die("180");
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		//echo $id;
		$avatar =  Avatars::where('_id', $id)
				->first();


		if($avatar != null){
			$sources = Avatars_sources::where('avatar_Id', $avatar->id)->get();
			$avatar->sources = $sources;
		}

		$languages = Language::all();


		return view('content.avatars.avatars_edit', [
			'avatar' => $avatar, 'languages' => $languages
		]);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		$avatar =  Avatars::where('_id', $id)
				->first();

		if($avatar != null){

			if($request['file_removed'] == 1){
				$imgfilename = "";
			}else{
				$imgfilename = $avatar->image;
			}


          if ($request->hasFile('dp')) {
				$randomize = rand(111111, 999999);
				$extension = $request->file('dp')->extension();
				$filename = $randomize . '.' . $extension;
				$image = $request->file('dp')->move('public/images/', $filename);
				$imgfilename = $filename;
			}

			$name = $request['avatar_name'];
			$avatar_task = $request['avatar_task'];
			$avatar_days = $request['avatar_days'];
			$avatar_hours = $request['avatar_hours'];
			$aricle_per_day = $request['aricle_per_day'];
			$feed_per_hour = $request['feed_per_hour'];
			
	
			$permission = $request['permissions'];
	
	
			$app_yek_allow = 0;
			$app_yek_keeponline = 0;
			if(isset($request['app_login1'])){
				$app_yek_allow = 1;
			}
			$app_yek_title = $request["media_1"];
			$app_yek_name = $request["username_1"];
			$app_yek_pass = $request["pass_1"];
			if(isset($request['keep_online_1'])){
				$app_yek_keeponline = 1;
			}
			$app_yek_logout = $request["logout_time_1"];
	
			$app_yahla_allow = 0;
			$app_yahla_keeponline = 0;
			if(isset($request['app_login2'])){
				$app_yahla_allow = 1;
			}
			$app_yahla_title = $request["media_2"];
			$app_yahla_name = $request["username_2"];
			$app_yahla_pass = $request["pass_2"];
			if(isset($request['keep_online_2'])){
				$app_yahla_keeponline = 1;
			}
			$app_yahla_logout = $request["logout_time_2"];
	
			$app_facebook_allow = 0;
			$app_facebook_keeponline = 0;
			if(isset($request['app_login3'])){
				$app_facebook_allow = 1;
			}
			$app_facebook_title = $request["media_3"];
			$app_facebook_name = $request["username_3"];
			$app_facebook_pass = $request["pass_3"];
			if(isset($request['keep_online_3'])){
				$app_facebook_keeponline = 1;
			}
			$app_facebook_logout = $request["logout_time_3"];
	
			$app_tik_allow = 0;
			$app_tik_keeponline = 0;
			if(isset($request['app_login4'])){
				$app_tik_allow = 1;
			}
			$app_tik_title = $request["media_4"];
			$app_tik_name = $request["username_4"];
			$app_tik_pass = $request["pass_4"];
			if(isset($request['keep_online_4'])){
				$app_tik_keeponline = 1;
			}
			$app_tik_logout = $request["logout_time_4"];
	
			$app_insta_allow = 0;
			$app_insta_keeponline = 0;
			if(isset($request['app_login5'])){
				$app_insta_allow = 1;
			}
			$app_insta_title = $request["media_5"];
			$app_insta_name = $request["username_5"];
			$app_insta_pass = $request["pass_5"];
			if(isset($request['keep_online_5'])){
				$app_insta_keeponline = 1;
			}
			$app_insta_logout = $request["logout_time_5"];
	
	
			$language = $request['select_lang'];
			$translate_lang = $request['translate_lang'];

			$avcat = $request["avatar_category"];

		$source_link = $request['source_link'];

		$avatar->name = $name;
		$avatar->status = 1;
		$avatar->task = $avatar_task;
		$avatar->working_days = $avatar_days;
		$avatar->working_hours = $avatar_hours;
		$avatar->articles_day = $aricle_per_day;
		$avatar->articles_hours = $feed_per_hour;
		$avatar->image = $imgfilename;
		$avatar->select_lang = $language;
		$avatar->translate_lang = $translate_lang;
		$avatar->category = $avcat;

		$avatar->permission = $permission;

		$avatar->app_yek_alow = $app_yek_allow;
		$avatar->app_yek_title = $app_yek_title;
		$avatar->app_yek_name = $app_yek_name;
		$avatar->app_yek_pass = $app_yek_pass;
		$avatar->app_yek_keeplogin = $app_yek_keeponline;
		$avatar->app_yek_logout = $app_yek_logout;

		$avatar->app_yahla_allow = $app_yahla_allow;
		$avatar->app_yahla_title = $app_yahla_title;
		$avatar->app_yahla_name = $app_yahla_name;
		$avatar->app_yahla_pass = $app_yahla_pass;
		$avatar->app_yahla_keeponline = $app_yahla_keeponline;
		$avatar->app_yahla_logout = $app_yahla_logout;

		$avatar->app_facebook_allow = $app_facebook_allow;
		$avatar->app_facebook_title = $app_facebook_title;
		$avatar->app_facebook_name = $app_facebook_name;
		$avatar->app_facebook_pass = $app_facebook_pass;
		$avatar->app_facebook_keeponline = $app_facebook_keeponline;
		$avatar->app_facebook_logout = $app_facebook_logout;

		$avatar->app_tik_allow = $app_tik_allow;
		$avatar->app_tik_title = $app_tik_title;
		$avatar->app_tik_name = $app_tik_name;
		$avatar->app_tik_pass = $app_tik_pass;
		$avatar->app_tik_keeponline = $app_tik_keeponline;
		$avatar->app_tik_logout = $app_tik_logout;

		$avatar->app_insta_allow = $app_insta_allow;
		$avatar->app_insta_title = $app_insta_title;
		$avatar->app_insta_name = $app_insta_name;
		$avatar->app_insta_pass = $app_insta_pass;
		$avatar->app_insta_keeponline = $app_insta_keeponline;
		$avatar->app_insta_logout = $app_insta_logout;
		
		$avatar->update();

		$avid = $avatar->id;

		$sources = Avatars_sources::where('avatar_Id', $avatar->id)->get();
		foreach($sources as $sr){
			$sr->delete();
		}

		foreach($source_link as $link){
			if($link != ""){
				$source = new Avatars_sources();
				$source->avatar_Id = $avid;
				$source->source_link = $link;
				$source->save();
			}
		}


		}

		return redirect()->route('avatars.index')->with('success','Avatar updated successfully.');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avatars $avatar)
    {
		$avatar->delete();
		return redirect()->route('avatars.index')->with('success','Avatar deleted successfully.');
		//
        //
    }


	public function del_manag_avatars($id){
		//echo $id;

		$avatarfeed = Avatars_Feed::where('_id', $id)->first();

		$avatarid = $avatarfeed->avatar_Id;
		
		$avatar = Avatars::where('av_Id', $avatarid)->first();
		$aid = $avatar->id;

		$avatarfeed->delete();

		return redirect()->route('avatars.manag_avatars', ['id' => $aid])->with('success','Feed deleted successfully.');
	}


	public function update_manag_avatars($id){
		//echo $id;

		$avatarfeed = Avatars_Feed::where('_id', $id)->first();

		$avatarid = $avatarfeed->avatar_Id;
		
		$avatar = Avatars::where('av_Id', $avatarid)->first();
		$aid = $avatar->id;

		$avatarfeed->online = 1;
		$avatarfeed->online_time = date("Y-m-d H:i:s");

		$avatarfeed->update();

		return redirect()->route('avatars.manag_avatars', ['id' => $aid])->with('success','Feed shared successfully.');
	}
}
