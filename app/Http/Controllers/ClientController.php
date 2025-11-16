<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Badan Usaha Milik Desa Kotakan | Kecamatan Situbondo',
            'latestNews' => DB::table('news')->orderByDesc('news_created_date')->limit(3)->get()
        ];

        return view('client._content.home', $data);
    }

    public function about() {
        $data = [
            'title' => 'Badan Usaha Milik Desa Kotakan | Kecamatan Situbondo | Tentang Kami',
            'stucture_org' => DB::table('role_structure')
                                ->join('role', 'role.role_id', '=', 'role_structure.role_structure_fk_id')
                                ->orderBy('role.role_id', 'asc')
                                ->get()
        ];

        return view('client._content.about', $data);
    }

    public function aboutBujukNK() {
        $data = [
            'title' => 'Badan Usaha Milik Desa Kotakan | Kecamatan Situbondo | Bujuk Nur Kasian'
        ];

        return view('client._content.bujukNurKasian', $data);
    }

    public function vision() {
        $data = [
            'title' => 'Badan Usaha Milik Desa Kotakan | Kecamatan Situbondo | Visi dan Misi'
        ];

        return view('client._content.visiMisi');
    }

    public function news() {
        $data = [
            'title' => 'Badan Usaha Milik Desa Kotakan | Kecamatan Situbondo | Berita Terbaru',
            'news' => DB::table('news')->orderByDesc('news_created_date')->get()
        ];

        return view('client._content.news', $data);
    }

    public function newsDetails($id) {
        $query = DB::table('news')->where('news_id',  $id)->first();
        $data = [
            'title' => 'Badan Usaha Milik Desa Kotakan | Kecamatan Situbondo | ' . Str::substr(ucwords($query->news_title), 0, 60),
            'news' => $query,
            'latestNews' => DB::table('news')->orderByDesc('news_created_date')->limit(5)->get()
        ];

        return view('client._content.newsDetails', $data);
    }
}
