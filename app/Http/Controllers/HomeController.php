<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $files = File::select('files.*', 'users.name as username', 'folders.name as foldername')
                    ->leftJoin('users', 'files.created_by_id', '=', 'users.id')
                    ->leftJoin('folders', 'files.folder_id', '=', 'folders.id')
                    ->get();
    $folders = Folder::select('folders.*', 'users.name as username')
                    ->leftJoin('users', 'folders.created_by_id', '=', 'users.id')
                    ->get();

    return view('home', compact('files', 'folders'));
}
}
