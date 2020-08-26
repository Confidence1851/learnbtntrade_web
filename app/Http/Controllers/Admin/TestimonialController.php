<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonials.index',compact('testimonials'));
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
        Testimonial::create($data);
        return redirect()->back()->with('success_msg', 'Testimonial created successfully!');
    }


    public function validateData($request , $id = null)
    {
        // dd($request->all());
        $data = $request->validate([
            'title' => 'required|string',
            'name' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|mimetypes:image/jpeg,image/png,image/jpg,image/svg',
            'featured' => 'required|string',
            'status' => 'required|string',
        ]);

        if(!empty( $image = $request->file('image'))){
            $data['image'] = putFileInStorage($image , $this->testimonialImagePath);
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
        $testimonial = Testimonial::find($id);

        $data = $this->validateData($request , $id);
        try{
            if(!empty($request['file'])){
                deleteFileFromStorage($testimonial->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old testimonial image!');
        }
        $testimonial->update($data);
        return redirect()->back()->with('success_msg', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        try{
            if(!empty($testimonial->image)){
               deleteFileFromStorage($testimonial->image);
            }
        }
        catch(\Exception $e){
            session()->flash('error_msg' , 'Couldn`t delete old testimonial image!');
        }
        $testimonial->delete($testimonial->id);
        return redirect()->back()->with('success_msg', 'Testimonial deleted successfully!');
    }
}
