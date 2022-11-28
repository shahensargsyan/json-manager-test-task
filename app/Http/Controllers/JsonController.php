<?php

namespace App\Http\Controllers;

use App\Models\Records;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function save(Request $request): object
    {
        if (!is_object(json_decode($request->input('json_data')))) {
            return response()->json([
                    'error' => true,
                    'message' => 'invalid json object'
                ], 400);
        }

        $record = Records::create([
            'json_data' => $request->input('json_data')
        ]);

        return response()->json([
            'id' => $record->id,
            'message' => 'invalid json object'
        ], 400);
    }

}
