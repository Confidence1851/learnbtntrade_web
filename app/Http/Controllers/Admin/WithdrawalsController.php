<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawalsController extends Controller
{
    public function index(){
        $withdrawals = Withdrawal::orderby('created_at','desc')->get();
        return view('admin.withdrawals.index',compact('withdrawals'));
    }

    public function pending(){
        $users = User::where('wallet' , '>=' , 1)->wherehas('bank')->orderby('wallet','desc')->get();
        return view('admin.withdrawals.pending',compact('users'));
    }


    public function approve(Request $request){
        $data = $request->validate([
            'items' => 'required|string'
        ]);
        $items = explode(',',$data['items']);
        try{
            DB::beginTransaction();
            foreach($items as $item){
                $user = $this->User->find($item);
                if(!empty($user) && $user->wallet > 0){
                    $with = Withdrawal::create([
                        'admin_id' => auth()->id(),
                        'user_id' => $user->id,
                        'amount' => $user->wallet,
                        'bank_name' => $user->bank->bank_name ?? '',
                        'account_name' => $user->bank->account_name ?? '',
                        'account_number' => $user->bank->account_number ?? '',
                    ]);

                    $user->wallet -= $with->amount;
                    $user->save();
                }
            }
            DB::commit();
            return redirect()->back()->with('success_msg','Withdrawal approved successfully!');
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error_msg','Error message: '.$e->getMessage());
        }
    }


}
