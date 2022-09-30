<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cloth;

class ClothController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cloth_index=Cloth::all();
        return view('admin.cloth.index',compact('cloth_index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cloth_create_category=Category::all();
        return view('admin.cloth.create',compact('cloth_create_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'cloth_name'=>'required',
            'category_id'=>'required',
            'cloth_type'=>'required',
            'size'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'color'=>'required',
            'photos'=>'required',
            'photos.*'=>'required',

        ]);
        if($request->hasfile('photos')) {
            foreach($request->file('photos') as $file)
            {
                // $file = $request->file('profile_img');
                $imgName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $imgName);

                // $imgName = $file->getClientOriginalName();
                // $file->move(public_path().'/images/', $imgName);
                // $imgData[] = $imgName;
            }
            $cloth_store_size= json_encode($request->size);
            $cloth_store_color=json_encode($request->color);

            $cloth_store=new Cloth();
            $cloth_store->user_id=$request->user_id;
            $cloth_store->cloth_name=$request->cloth_name;
            $cloth_store->category_id=$request->category_id;
            $cloth_store->cloth_type=$request->cloth_type;
            $cloth_store->size=$cloth_store_size;
            $cloth_store->price=$request->price;
            $cloth_store->discount_price=$request->discount_price;
            $cloth_store->quantity=$request->quantity;
            $cloth_store->color=$cloth_store_color;
            $cloth_store->photos=json_encode($imgName);
            $cloth_store->favourite_status=$request->favourite_status;
            $cloth_store->description=$request->description;

            $cloth_store->save();
            $cloth_index=Cloth::all();
            return redirect()->route('cloth.index',compact('cloth_index'))->with('success','New cloth is added successfully');
        }else{
            return redirect()->back()->with('success','Please Add Images');
        }

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cloth_edit = Cloth::findOrFail($id);
        $cloth_edit_size=json_decode($cloth_edit->size);
        $cloth_edit_color=json_decode($cloth_edit->color);
        $cloth_edit_category=Category::all();
        return view('admin.cloth.edit',compact('cloth_edit','cloth_edit_category','cloth_edit_size','cloth_edit_color'));
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
        $validated=$request->validate([
            'cloth_name'=>'required',
            'category_id'=>'required',
            'cloth_type'=>'required',
            'size'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'color'=>'required',
            'photos'=>'required'
        ]);

        $cloth_update_color=json_encode($request->color);

        $cloth_update = Cloth::findOrFail($id);
        $cloth_update->user_id = $request->user_id;
        $cloth_update->cloth_name=$request->cloth_name;
        $cloth_update->category_id=$request->category_id;
        $cloth_update->cloth_type=$request->cloth_type;
        $cloth_update->size=$request->size;
        $cloth_update->price=$request->price;
        $cloth_update->discount_price=$request->discount_price;
        $cloth_update->quantity=$request->quantity;
        $cloth_update->color=$cloth_update_color;
        $cloth_update->photos=$request->photos;
        $cloth_update->favourite_status=$request->favourite_status;
        $cloth_update->description=$request->description;

        $cloth_update->update();

        $cloth_index=Cloth::all();
        return redirect()->route('cloth.index',compact('cloth_index'))->with('success','New cloth is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cloth = Cloth::findOrFail($id);
        $cloth->delete();

        return redirect ()->back()->with('success', 'Cloth is deleted successfully!');
    }
}
