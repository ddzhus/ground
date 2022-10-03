<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function database()
    {
        return view('database', [
            'users' => User::paginate(10),
        ]);
    }

    public function add()
    {
        TestJob::dispatch()->onQueue('default');
        return back();
    }

    public function clean()
    {
        DB::table('jobs')->truncate();
        DB::table('failed_jobs')->truncate();
        return back();
    }

    public function retry()
    {
        Artisan::call('queue:retry all');
        return back();
    }

    public function queue()
    {
        return view('queue', [
            'active' => DB::table('jobs')->limit(10)->get(),
            'failed' => DB::table('failed_jobs')->limit(10)->get(),
        ]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('image')->store('public');

        if (!Storage::exists('public/crop')) {
            Storage::makeDirectory('public/crop');
        }

        $image = Image::make(Storage::path($file));
        $image->fit(320, 240);
        $image->save(Storage::path('public/crop/'.basename($file)));

        Session::put('image', Storage::url('crop/'.basename($file)));

        return redirect()->route('index');
    }

    public function dynamic(string $param)
    {
        return [
            'param'    => $param,
            'time'     => Carbon::now()->toDateTimeString(),
            'hostname' => env('HOSTNAME')
        ];
    }

}
