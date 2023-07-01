<?php

namespace App\Http\Controllers\WEB\admin\car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{

    public function create(Request $request)
    {
        $image = $request->file('image_url');
        $imageUrl = time() . $image->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $destinationStorage = 'car-image';

        // upload file
        $image->move($destinationStorage, $imageUrl);

        $imageUrl = url("/" . $destinationStorage . "/" . $imageUrl);

        Car::create([
            "name" => $request->name,
            "image_url" => $imageUrl,
            "description" => $request->description,
            "price" => $request->price,
            "stock" => $request->stock,
            "sold" => 0,
        ]);

        return redirect("/admin/car/index")->with("success_create", "Success Create Car");
    }

    public function update(Request $request)
    {
        $getCar = Car::where("id", $request->id)->first();
        if ($request->image_url == null) {

            Car::where("id", $request->id)->update([
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "stock" => $request->stock,
            ]);

            return redirect("/admin/car/index")->with("success_update", "Success Update Car");
        }
        $basePath = url('/');
        $delfile = str_replace("$basePath/", "", $getCar->image_url);
        File::delete($delfile);

        $image = $request->file('image_url');
        $imageUrl = time() . $image->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $destinationStorage = 'car-image';

        // upload file
        $image->move($destinationStorage, $imageUrl);

        $imageUrl = url("/" . $destinationStorage . "/" . $imageUrl);

        Car::where("id", $request->id)->update([
            "name" => $request->name,
            "image_url" => $imageUrl,
            "description" => $request->description,
            "price" => $request->price,
            "stock" => $request->stock,
        ]);

        return redirect("/admin/car/index")->with("success_update", "Success Update Car");
    }

    public function delete($id)
    {
        $getCar = Car::where("id", $id)->first();
        $basePath = url('/');
        $delfile = str_replace("$basePath/", "", $getCar->image_url);
        File::delete($delfile);
        $getCar->delete();

        return redirect("/admin/car/index")->with("success_delete", "Success Deleted Car");
    }
}
