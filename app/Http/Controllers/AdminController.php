<?php

namespace App\Http\Controllers;

use App\Models\Records;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $records = Records::all()->pluck('json_data', 'id');

        return view("admin.index", compact('records'));
    }

    public function edit(int $id): View
    {
        $record = Records::find($id);

        return view("admin.edit", compact('record'));
    }

    public function update(int $id, Request $request): object
    {
        $record = Records::find($id);
        if (!$record) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found'
            ], 404);
        }

        $record->json_data = $request->input('json_data');
        $record->save();

        return response()->json([
            'status' => true,
            'message' => 'Successfully edited'
        ], 200);
    }

    public function delete(int $id)
    {
        $record = Records::find($id);
        if (!$record) {
            return redirect('admin');
        }

        $record->delete();

        return redirect('/');
    }
}
