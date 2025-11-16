<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer;

class Helper {
    
    public static function test() {
        return "hehe";
    }

    public static function headerLastestNews() {
        $html = '';
        $query = DB::table('news')
                    ->orderByDesc('news_created_date')
                    ->limit(5)
                    ->get();

        if ($query->count() > 0) {
            foreach ($query as $latestNews) {
                $html .= '<li><a href="'. route('client.news.details', ['id' => $latestNews->news_id]) .'"><i class="fas fa-newspaper"></i></i> '. 
                    ((Str::length($latestNews->news_title) > 20) 
                        ? (Str::substr(ucwords($latestNews->news_title), 0, 15) . ' ...') 
                        : ucwords($latestNews->news_title)) .
                    '</a></li>';
            }
        }

        return $html;
    }
}
