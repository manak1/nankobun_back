<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Shindan;


class ShindanController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emoji' => 'required | max:1',
            'name' => 'required | max:20',
            'author' => 'required | max:20',
            'unit' => 'required | max:1',
            'height' => 'required | max:1000',
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }

        $shindan = new Shindan();
        $shindan-> emoji = $request -> emoji;
        $shindan-> name = $request -> name;
        $shindan-> author = $request -> author;
        $shindan-> unit = $request -> unit;
        $shindan-> height = $request -> height;
        $shindan->save();
        return response()-> json([
            'shindan' => $shindan
        ],200);
    }
}
