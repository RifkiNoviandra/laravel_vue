<?php

namespace App\Http\Controllers;

use App\Models\facility;
use Illuminate\Http\Request;

class facilityController extends Controller
{
    function create(Request $request){
        $request->validate([
            'id_destination' => 'required',
            'facility' => 'required'
        ]);

        $input = $request->only('id_destination' , 'facility');

        $insert = facility::create($input);

        if (!$insert){
            return response([
                'message' => 'Data cant be processed'
            ]);
        }

        return response([
            'message' => 'data inserted'
        ]);
    }

    function delete(Request $request , $id){
        $id_facility = $id ;

        $select = facility::where('id' , $id_facility);

        if (!$select){
            return response([
                'message' => 'data with '.$id_facility.' cant be found'
            ]);
        }

        if ($select->delete()){
            return response([
                'message' => 'data deleted'
            ]);
        }

        return response([
            'message' => 'data cant be deleted'
        ]);
    }

    function update(Request $request , $id){
        $id_facility = $id ;

        $select = facility::where('id' , $id)->first();
        if (!$select){
            return response([
                'message' => 'Data with '.$id_facility.' cant be found'
            ]);
        }

        $request->id_destination ? $input['id_destination'] = $request->id_destination : $input['id_destination'] = $select->id_destination ;
        $request->facility ? $input['facility'] = $request->facility : $input['facility'] = $select->facility ;

        $update = $select->update($input);

        if (!$update){
            return response([
                'message' => 'Data cant be updated'
            ]);
        }

        return response([
            'message' => 'data updated'
        ]);
    }

    function getAllData(Request $request){

        $data = facility::all();

        return response([
            $data
        ]);
    }
}
