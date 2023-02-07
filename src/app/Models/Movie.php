<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;
class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'movie_title',
        'movie_content',
        'movie_pic',
        'movie_evaluation',
        'movie_url',
        'search_text',
    ];
    /**
     * idに紐づくデータを取得する
     * 
     * @param integer id
     * @return array movies
     */
    public static function GetDataByMovieId($id){
        return \DB::table('movies')->where('id', '=', $id)->first();
    }

    /**
     * テーブルに存在するデータを取得する
     * 
     * @param void
     * @return array
     */
    public static function GetAllData(){
        return \DB::table('movies')->orderBy('updated_at', 'desc')->get();
    }

    /**
     * テーブルに存在するデータを取得する検索用
     * 
     * @param string data
     * @return array
     */
    public function GetAllDataSerchString($serch_string){
        return \DB::table('movies')->where('serch_string', 'like', "%{$serch_string}%")->get();
    }

    /**
     * 映画情報を登録する
     * 
     * @param array $data
     * @return void
     */
    public function RegisterMovieInformation($data){
        $movie = new Movie();

        $movie->user_id = Auth::id();
        $movie->movie_title = $data->movie_title;
        $movie->movie_content = $data->movie_content;
        $movie->pic = $data->movie_pic;
        $movie->movie_evaluation = $data->movie_evaluation;
        $movie->movie_url = $data->movie_url;
        $movie->search_text  = "$data->movie_title$data->movie_content$data->movie_url";
        $movie->created_at = Carbon::now();
        $movie->save();

    }

    /**
     * 映画情報を更新する
     * 
     * @param array $data
     * @return void
     */
    public function UpdateMovieInformation($data){
        $movie = GetDataByMovieId($id);

        $movie->user_id = Auth::id();
        $movie->movie_title = $data->movie_title;
        $movie->movie_content = $data->movie_content;
        $movie->pic = $data->movie_pic;
        $movie->movie_evaluation = $data->movie_evaluation;
        $movie->movie_url = $data->movie_url;
        $movie->search_text  = "$data->movie_title$data->movie_content$data->movie_url";
        $movie->updated_at = Carbon::now();
        $movie->save();

    }
}
