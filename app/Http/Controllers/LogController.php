<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    /**
     * Display a listing of File.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('file_access')) {
            return abort(401);
        }
        // if ($filterBy = Request::get('filter')) {
        //     if ($filterBy == 'all') {
        //         Session::put('File.filter', 'all');
        //     } elseif ($filterBy == 'my') {
        //         Session::put('File.filter', 'my');
        //     }
        // }

        
        $logs = Log::all();
        
        $user = Auth::getUser();
        // $userFilesCount = File::where('created_by_id', $user->id)->count();

        return view('admin.logs.index', compact('logs'));
    }

}
