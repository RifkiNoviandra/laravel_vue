<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Psy\Util\Str;

class destinationController extends Controller
{
    function create(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'rating' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $input = $request->only('name', 'location', 'latitude', 'longitude', 'rating', 'description');

        $files = $request->file('image');
        $ext = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
        $file_ext = $files->getClientOriginalExtension();

        if (in_array($file_ext, $ext)) {
            $name = \Illuminate\Support\Str::random(7) . $files->getClientOriginalName();
            $input['image'] = $name;
            $request->image->move(public_path() . "/images", $name);
        } else {
            return response([
                'message' => 'file extension doesnt meet the requirement'
            ]);
        }

        $insert = Destination::create($input);

        if (!$insert) {
            return response([
                'message' => "Data Can't Be Processed"
            ]);
        }

        return response([
            'message' => 'data inserted'
        ]);

    }

    function delete(Request $request, $id)
    {

        $id_destination = $id;

        $select = Destination::where('id', $id_destination)->first();

        if (!$select) {
            return response([
                'message' => 'Data with' . $id_destination . "cant Be found"
            ]);
        }

        if ($select->delete()) {
            return response([
                'message' => 'data deleted'
            ]);
        }

        return response([
            'message' => 'data cant be deleted'
        ]);
    }

    function update(Request $request, $id)
    {
        $id_destination = $id;

        $select = Destination::where('id', $id_destination)->first();

        if (!$select) {
            return response([
                'message' => 'Data with' . $id_destination . 'cant be found'
            ]);
        }

        $request->name ? $input['name'] = $request->name : $input['name'] = $select->name;
        $request->location ? $input['location'] = $request->location : $input['location'] = $select->location;
        $request->latitude ? $input['latitude'] = $request->latitude : $input['latitude'] = $select->latitude;
        $request->longitude ? $input['longitude'] = $request->longitude : $input['longitude'] = $select->longitude;
        $request->rating ? $input['rating'] = $request->rating : $input['rating'] = $select->rating;
        $request->description ? $input['description'] = $request->description : $input['description'] = $select->description;

        if ($files = $request->file('image')) {
            $ext = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
            $file_ext = $files->getClientOriginalExtension();

            if (in_array($file_ext, $ext)) {
                $name = \Illuminate\Support\Str::random(7) . $files->getClientOriginalName();
                $input['image'] = $name;
                $files->move(public_path() . "/images", $name);
            } else {
                return response([
                    'message' => 'file extension doesnt meet the requirement'
                ]);
            }
        } else {
            $input['image'] = $select->image;
        }

        $update = $select->update($input);

        if (!$update) {
            return response([
                'message' => 'data cant be updated'
            ]);
        }

        return response([
            'message' => 'data updated'
        ]);

    }

    function getAllData(Request $request)
    {
        $data = Destination::all();

        return response([
            'data' => $data
        ]);
    }

    function getDataId(Request $request, $id)
    {
        $id_destination = $id;
//        $data = Destination::where('id' , $id_destination)->with('review.user' , 'facility')->first();
        $data = Destination::find($id);
        $data->load('review.user', 'facility');
        return response([
            'data' => $data
        ]);
    }
}
