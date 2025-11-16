<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        if (session()->get('login') != NULL) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.login.index');
        }
    }

    public function processLogin(Request $request) {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        
        $message = [
            'username' => 'Username Tidak Boleh Kosong !',
            'password' => 'Password Tidak Boleh Kosong !',
        ];

        $request->validate($rules, $request->all(), $message);

        $admin =  DB::table('users')
                    ->where('user_name', $request['username'])
                    ->where('user_password', hash('sha256', $request['password']))
                    ->whereNull('user_deleted_by')
                    ->whereNull('user_deleted_at')
                    ->first();

        if ($admin) {
            session()->put('userID', $admin->user_id);
            session()->put('userName', $admin->user_name);
            session()->put('login', true);
            return redirect()->route('admin.dashboard');
        } else {
            session()->put('typeError', 'error');
            return redirect()->route('admin.login')->with('message', 'Gagal login, Password / Username Salah !');
        }
    }

    public function processLogout() {
        session()->flush();
        return redirect()->route('admin.login');
    }

    public function dashboard() {
        $data = [
            'title' => 'BUMDES Kotakan | Dashboard',
            'news' => DB::table('news')->get(),
            'admins' => DB::table('users')
                ->whereNull('user_deleted_by')
                ->whereNull('user_deleted_at')
                ->get()
        ];

        return view('admin.backoffice._content.dashboard', $data);
    }

    public function articles() {
        $data = [
            'title' => 'BUMDES Kotakan | Master Artikel',
            'news' => DB::table('news')
                ->orderByDesc('news_created_date')
                ->get()
        ];

        return view('admin.backoffice._content.articles', $data);
    }

    public function addArticles(Request $request) {
        $rules = [
            'tambah-artikel-title' => 'required',
            'tambah-artikel-image' => 'required|image|mimes:jpeg,png,jpg,gif|max:300',
            'tambah-artikel-description' => 'required',
        ];
        
        $message = [
            'tambah-artikel-title.required' => 'Judul Tidak Boleh Kosong!',
            'tambah-artikel-image.max' => 'Gambar Tidak Boleh Lebih Dari 300KB!',
            'tambah-artikel-image.image' => 'File harus berupa gambar!',
            'tambah-artikel-image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif!',
            'tambah-artikel-description.required' => 'Deskripsi Tidak Boleh Kosong !',
        ];

        $request->validate($rules, $message);

        $lastID = DB::table('news')->orderByDesc('news_id')->first();
        if($lastID) {
            $lastID = ($lastID->news_id) + 1;
        } else {
            $lastID = 1;
        }

        // get file extension
        $file = $request->file('tambah-artikel-image');
        $extension = $file->getClientOriginalExtension();

        // move file
        $filename = 'News-'.$lastID.'.'.$extension;
        $file->move(public_path('images/news'), $filename);

        DB::table('news')->insert([
            'news_title' => $request['tambah-artikel-title'],
            'news_description' => $request['tambah-artikel-description'],
            'news_picture' => 'News-'.$lastID.'.'.$extension,
            'news_author' => session()->get('userName')
        ]);

        return redirect()->route('admin.articles');
    }

    public function updateArticles(Request $request) {
        $rules = [
            'update-artikel-id' => 'required',
            'update-artikel-title' => 'required',
            'update-artikel-image' => 'image|mimes:jpeg,png,jpg,gif|max:300',
            'update-artikel-description' => 'required',
        ];
        
        $message = [
            'update-artikel-id.required' => 'ID Tidak Boleh Kosong !',
            'update-artikel-title.required' => 'Judul Tidak Boleh Kosong !',
            'update-artikel-image.max' => 'Gambar Tidak Boleh Lebih Dari 300KB!',
            'update-artikel-image.image' => 'File harus berupa gambar!',
            'update-artikel-image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif!',
            'update-artikel-description.required' => 'Deskripsi Tidak Boleh Kosong !',
        ];

        $request->validate($rules, $message);

        if ($request->hasFile('update-artikel-image')) {
            $currentID = DB::table('news')
                ->where('news_id', $request['update-artikel-id'])
                ->first();

            // remove image if reupload
            $path = public_path('images/news/' . $currentID->news_picture);
            if (file_exists($path)) {
                unlink($path);
            }

            // get file extension
            $file = $request->file('update-artikel-image');
            $extension = $file->getClientOriginalExtension();

            // move file
            $filename = explode('.', $currentID->news_picture);
            $filename = $filename[0].'.'.$extension;
            $file->move(public_path('images/news'), $filename);

            DB::table('news')
                ->where('news_id', $request['update-artikel-id'])
                ->update([
                    'news_title' => $request['update-artikel-title'],
                    'news_description' => $request['update-artikel-description'],
                    'news_picture' => $filename,
                    'news_author' => session()->get('userName')
                ]);
        } else {
            DB::table('news')
                ->where('news_id', $request['update-artikel-id'])
                ->update([
                    'news_title' => $request['update-artikel-title'],
                    'news_description' => $request['update-artikel-description'],
                    'news_author' => session()->get('userName')
                ]);
        }

        return redirect()->route('admin.articles');
    }

    public function deleteArticles($id) {
        $currentID = DB::table('news')
            ->where('news_id', $id)
            ->first();

        // remove image if reupload
        $path = public_path('images/news/' . $currentID->news_picture);
        if (file_exists($path)) {
            unlink($path);
        }
        
        DB::table('news')->where('news_id', $id)->delete();
        return redirect()->route('admin.articles');
    }

    public function users() {
        $data = [
            'title' => 'BUMDES Kotakan | Master Admin',
            'admins' => DB::table('users')
                ->whereNull('user_deleted_by')
                ->whereNull('user_deleted_at')
                ->get()
        ];

        return view('admin.backoffice._content.users', $data);
    }

    public function addUsers(Request $request) {
        $rules = [
            'tambah-admin-username' => 'required',
            'tambah-admin-password' => 'required',
        ];
        
        $message = [
            'tambah-admin-username.required' => 'Username Tidak Boleh Kosong !',
            'tambah-admin-password.required' => 'Password Tidak Boleh Kosong !',
        ];

        $request->validate($rules, $message);

        DB::table('users')->insert([
            'user_id' => time(),
            'user_name' => $request['tambah-admin-username'],
            'user_password' => hash('sha256', $request['tambah-admin-password'])
        ]);

        return redirect()->route('admin.users');
    }

    public function updateUsers(Request $request) {
        $rules = [
            'update-admin-username' => 'required',
            'update-admin-password' => 'required',
        ];
        
        $message = [
            'update-admin-username.required' => 'Username Tidak Boleh Kosong !',
            'update-admin-password.required' => 'Password Tidak Boleh Kosong !',
        ];

        $request->validate($rules, $message);

        DB::table('users')->where('user_id', $request['update-admin-id'])->update([
            'user_name' => $request['update-admin-username'],
            'user_password' => hash('sha256', $request['update-admin-password'])
        ]);

        if (session()->get('userID') == $request['update-admin-id']) {
            session()->put('userName', $request['update-admin-username']);
        }

        return redirect()->route('admin.users');
    }

    public function deleteUsers($id) {
        DB::table('users')->where('user_id', $id)->update([
            'user_deleted_by' => session()->get('userID'),
            'user_deleted_at' => Carbon::now()
        ]);

        return redirect()->route('admin.users');
    }
}
