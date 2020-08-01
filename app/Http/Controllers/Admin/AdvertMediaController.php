<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertMediaController extends Controller
{
    public $imagepath = 'images/adverts/images';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $this->validateData($request);
        $this->AdvertMedia->create($data);
        return redirect()->back()->with('success_msg', 'Advert Media created successfully!');
    }


    public function validateData($request)
    {
        $data = $request->validate([
            'advert_id' => 'required|string|exists:adverts,id',
            'type' => 'required|string',
            'source' => 'required|string',
            'caption' => 'required|string',
            'file' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/svg',
            'file_url' => 'nullable|string',
            'url' => 'nullable|string',
            'status' => 'required|string',
        ]);

        if(!empty($request['file'])){
            $image = $file = $request->file('file');
            $filename = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path($this->imagepath) , $filename);
            $data['file'] = $filename;
        }
        return $data;
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
        $media = $this->AdvertMedia->model()->findorfail($id);
        $data = $this->validateData($request);
        try{
            if(!empty($request['file'])){
                unlink(public_path($this->imagepath.'/'.$media->file));
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old media file! Error: '.$e->getMessage());
        }
        $media->update($data);
        return redirect()->back()->with('success_msg', 'Advert Media updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = $this->AdvertMedia->find($id);
        try{
            if(!empty($media->file)){
                unlink(public_path($this->imagepath.'/'.$media->file));
            }
            $media->delete();
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old media file! Error: '.$e->getMessage());
        }
        return redirect()->back()->with('success_msg', 'Advert Media deleted successfully!');
    }
}
