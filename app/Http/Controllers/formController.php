<?php

namespace App\Http\Controllers;

use App\Models\forms;
use App\Models\Items;
use Illuminate\Http\Request;

class formController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rfqs = Items::all();
        return view('rfq')->with('rfqs', $rfqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->name;
        $email = $request->email;
        $location = $request->location;
        $itemName = $request->itemName;
        $des = $request->description;
        $mb = $request->mb;
        $mxb = $request->mxb;
        $arr = array();
        $arrItem = [];
        foreach ($_POST as $key => $value) {
            if ($key !== 'description' & $key !== 'email'  & $key !== 'location' & $key !== 'itemName' & $key !== 'name' & $key !== 'mb' & $key !== 'mxb' & $key !== 'quantity') {

                array_push($arr, explode('_', $key)[1]);
            }
        }

        $newArr = array_unique($arr);
        $forms =   forms::create([
            'fullName' =>  $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'items' => ""

        ]);
        foreach ($newArr as $key => $value) {
            # code...
            array_push($arrItem, $this->funArry($value, $request, $forms->id));
        }

        // array_push($arrItem, array(
        //     "name" => $_POST["itemName"],
        //     'description' => $_POST["description"],
        //     'img' => $this->upload($request, "img"),
        //     'quantity' => $_POST["quantity"],
        //     'minbudget' => $_POST["mb"],
        //     'maxbudget' => $_POST["mxb"],
        // ));

        // return $arrItem;

        $item =  Items::create([
            'form_id' => $forms->id,
            "name" => $_POST["itemName"],
            'description' => $_POST["description"],
            'img' => $this->upload($request, "img"),
            'quantity' => $_POST["quantity"],
            'minbudget' => $_POST["mb"],
            'maxbudget' => $_POST["mxb"],
        ]);

        return $item;
    }


    public function upload(Request $request, $name)
    {

        if ($request->hasFile("$name")) {
            $filenameWithExt = $request->file("$name")->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file("$name")->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore =   time() . "." . $extension;
            $path = $request->file("$name")->storeAs("public/image", $fileNameToStore);
        }
        // Else add a dummy image
        else {
            $fileNameToStore = "noimage.jpg";
        }
        return $fileNameToStore;
    }

    public function funArry($key, $request, $id)
    {
        return Items::create([
            'form_id' => $id,
            "name" => $_POST["item_$key"],
            'description' => $_POST["des_$key"],
            'img' => $this->upload($request, "img_$key"),
            'quantity' =>  $_POST["quantity_$key"],
            'minbudget' => $_POST["mb_$key"],
            'maxbudget' => $_POST["mxb_$key"],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = forms::find($id);
        return view('view')->with("item", $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
