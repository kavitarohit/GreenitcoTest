<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivities extends Model
{
   	protected $table = 'user_activities';
    protected $fillable = [ 'user_id','login_time','logout_time','break_start_time', 'break_end_time'];


    public function get_user_name()
    {
    	return $this->hasOne(User::class, 'id', 'user_id');
    }
}
