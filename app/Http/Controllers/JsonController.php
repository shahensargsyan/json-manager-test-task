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

        /*\Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
            $time = $query->time;
            Log::debug('time '.$time);
        });*/

        $msc = microtime(true);
        $record = Records::create([
            'json_data' => $request->input('json_data')
        ]);
        $msc = microtime(true)-$msc;

        $memory = "real: ".(memory_get_peak_usage(true)/1024/1024)." MiB";

        return response()->json([
            'id' => $record->id,
            'message' => 'invalid json object',
            'query time' =>  ($msc * 1000) . ' ms',
            'memory' =>  $memory,
        ], 400);
    }

}
