<?php

namespace App\Http\Controllers;

use App\Models\Records;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $records = Records::all()->pluck('json_data', 'id');

        return view("admin.index", compact('records'));
    }
}
