<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Store;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::orderBy('name', 'asc')->paginate(4);
        return view('pages.stores')->with('stores', $stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'logoPath' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('logoPath')){
            $filenameWithExt = $request->file('logoPath')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logoPath')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('logoPath')->storeAs('public/logos', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $store = new Store;
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->logoPath = $fileNameToStore;
        $store->save();

        return redirect('/viewStores')->with('success', 'Store Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);
        return view('pages.store')->with('store', $store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::find($id);
        return view('pages.update')->with('store', $store);
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
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'logoPath' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('logoPath')){
            $filenameWithExt = $request->file('logoPath')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logoPath')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('logoPath')->storeAs('public/logos', $fileNameToStore);
        }
        
        $store = Store::find($id);
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        if ($request->hasFile('logoPath')) {
            if ($store->logoPath != 'noimage.jpg') {
                Storage::delete('public/logos/'.$store->logoPath);
            }
            $store->logoPath = $fileNameToStore;
        }
        $store->save();

        return redirect('/viewStores')->with('success', 'Store Updated');
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
