<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_profile_image',
        // 'tel',
        // 'billing_ads',
        // 'billing_exchenge',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        /**
     * テーブルに存在するデータを取得する
     * 
     * @param void
     * @return array
     */
    public static function GetDataByUserId($id){
        return \DB::table('users')->where('id', '=', $id)->first();
    }

    /**
     * 会員情報を更新する
     * 
     * @param array $data
     * @return void
     */
    public function UpdateUserInformation($data){
        $movie = GetDataByMovieId($data->id);

        $movie->name = $data->name;
        $movie->email = $data->email;
        $movie->password = $data->password;
        $movie->name = $data->name;
        $movie->user_profile_image = $data->user_profile_image;
        ;
        $movie->updated_at = Carbon::now();
        $movie->save();

    }
}
