<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Shindan;


class ShindanController extends Controller
{

    public function index(Request $request) {
        $offset = $request->offset;
        if($offset) {
            $shindans = Shindan::latest()->offset($offset)->take(10)->get();
            return response([
                'shindans'=> $shindans
            ], 200);
        }
        $shindans = Shindan::latest()->take(10)->get();
        return response([
            'shindans'=> $shindans
        ], 200);
        
    }

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
        $shindan->emoji = $request->emoji;
        $shindan->name = $request->name;
        $shindan->author = $request->author;
        $shindan->unit = $request->unit;
        $shindan->height = $request->height;
        $shindan->save();
        return response()->json([
            'shindan' => $shindan
        ], 200);
    }

    public function get($id)
    {
        $shindan = Shindan::find($id);
        return response()->json([
            'shindan' => $shindan
        ], 200);
    }

    public function find(Request $request)
    {   
        $keyword= $request->keyword;
        if(!$keyword) {
            $shindans = Shindan::all()->take(10);
            return response([
                'shindans' => $shindans
            ],200);
        }

        $query = Shindan::query();
        $shindans = $query->where('name', 'like', '%'.$keyword.'%')->take(10)->get();
        return response([
            'shindans' => $shindans
        ],200);
    }
}
