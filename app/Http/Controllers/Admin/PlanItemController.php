<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanItem;
use Illuminate\Http\Request;

class PlanItemController extends Controller
{
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
        $planItem = PlanItem::create($data);
        return redirect()->back()->with('success_msg', 'Plan item created successfully!');
    }


    public function validateData($request , $id = null)
    {
        $data = $request->validate([
            'plan_id' => 'required|string',
            'number' => 'required|string',
            'icon' => 'nullable|string',
            'body' => 'required|string',
            'status' => 'required|string',
        ]);

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
        $planItem = PlanItem::find($id);

        $data = $this->validateData($request , $id);
        $planItem->update($data);
        return redirect()->back()->with('success_msg', 'Plan item updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PlanItem::findorfail($id)->delete();
        return redirect()->back()->with('success_msg', 'Plan item deleted successfully!');
    }
}
