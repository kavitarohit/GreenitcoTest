<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\UserActivities;
use Auth;
use DateTime;
class DashboardController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	$arrTimeDetails = UserActivities::with('get_user_name')->whereNull('break_start_time')->whereNull('break_end_time')->get()->toArray();
    	
    	if (isset($arrTimeDetails) && !empty($arrTimeDetails)) 
    	{
    		foreach ($arrTimeDetails as $key => $value) 
    		{
				$first_datetime = $value['login_time'];
				$last_datetime = $value['logout_time'];

				$dbDate = new DateTime($first_datetime);
				$aDate = new DateTime($last_datetime);
				$timePassed = $dbDate->diff($aDate);

				$totalWorkTime = $timePassed->h.':'.$timePassed->i.':'.$timePassed->s;

				$arrBreakDetails = UserActivities::whereNull('login_time')
													->whereNull('logout_time')
													->where('user_id',$value['user_id'])
													->get()
													->toArray();
												
				foreach ($arrBreakDetails as $brkey => $brvalue) 
				{
					$totalBreakTime = '00:00:00';
					$break_start_time = $brvalue['break_start_time'];
					$break_end_time = $brvalue['break_end_time'];

					$startDate = new DateTime($break_start_time);
					$endDate = new DateTime($break_end_time);
				
					$breakPassed = $startDate->diff($endDate);
					//$totalBreakTime = ($breakPassed->h * 60 * 60) + ($breakPassed->i * 60) + $breakPassed->s;
					$totalBreakTime = $breakPassed->h.':'.$breakPassed->i.':'.$breakPassed->s;
				}
				$arrTimeDetails[$key]['totalBreakTime'] = $totalBreakTime;
				$arrTimeDetails[$key]['totalWorkTime'] = $totalWorkTime;				
    		}
    	}
    	$data['arrTimeDetails']   = $arrTimeDetails;
    	$data['middleContent']    = 'admin/dashboard';
    	$data['pageTitle']        = 'dashboard';
    	return view('admin/template')->with($data);  
    }
}
