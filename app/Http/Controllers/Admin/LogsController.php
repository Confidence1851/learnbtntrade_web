<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity as ModelsActivity;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $logs = ModelsActivity::orderby('created_at','desc')->get();
        // $Coupon = Coupon::first();
        // $Coupon->amount = 100;
        // $Coupon->save();
        foreach($logs as $log){
            $log['type'] = ucwords($log->description);


            $log['changes_record'] = '';
            try{
                $changes = get_object_vars(json_decode($log->changes()));
                // dump($changes);
                foreach($changes as $key => $value){
                    // dd($key);
                    $log['changes_record'] .= '<h3>'.strtoupper($key).'</h3>';
                    foreach($value as $key => $value){
                        $log['changes_record'] .= '<p><b>'.strtoupper($key).':</b> '.$value.'</p>';
                    }

                }
                // dd($log['changes_record']);
            }
            catch(\Exception $e){
                $log['changes_record'] .= '<p><b>NOT FOUND</b></p>';
            }


            $log['cause_model'] = '<h3>'.$log->causer_type.'</h3>';
            try{
                $causer = get_object_vars(json_decode($log->causer));
                foreach($causer as $key => $value){
                    $log['cause_model'] .= '<p><b>'.strtoupper($key).':</b> '.$value.'</p>';
                }
            }
            catch(\Exception $e){
                $log['cause_model'] .= '<p><b>NOT FOUND</b></p>';
            }



            $log['subject_model'] = '<h3>'.$log->subject_type.'</h3>';
            try{
                $subject = get_object_vars(json_decode($log->subject));
                foreach($subject as $key => $value){
                    $log['subject_model'] .= '<p><b>'.strtoupper($key).'</b> '.$value.'</p>';
                }
            }
            catch(\Exception $e){
                $log['subject_model'] .= '<p><b>NOT FOUND</b></p>';
            }
                // dd($log);

        }
        return view('admin.log.index',compact('logs'));
    }

    // $log['changes_record'] = '<h3>'.$log->subject_type.'</h3>';
            //     $changes = explode(',' ,$log->changes());
            //     for($i = 0; $i < count($changes); $i++){
            //         $log['changes_record'] .= '<p>'.$changes[$i].'</p>';
            //     }
            // $log['cause_model'] = '<h3>'.$log->causer_type.'</h3>';
            //     $causer = explode(',' ,$log->causer);
            //     for($i = 0; $i < count($causer); $i++){
            //         $log['cause_model'] .= '<p>'.$causer[$i].'</p>';
            //     }
            // $log['subject_model'] = '<h3>'.$log->subject_type.'</h3>';
            //     $subject = explode(',' ,$log->subject);
            //     for($i = 0; $i < count($subject); $i++){
            //         $log['subject_model'] .= '<p>'.$subject[$i].'</p>';
            //     }

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
