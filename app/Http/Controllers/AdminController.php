<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return ['auth', 'admin'];
    }

    public function users()
    {
        return view('admin.users');
    }
    public function categories()
    {
        return view('admin.categories');
    }
}
