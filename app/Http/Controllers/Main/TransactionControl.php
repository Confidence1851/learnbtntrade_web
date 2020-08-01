<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

abstract class TransactionControl extends Controller
{

    public function transactionHistory(){
        $user = $this->User->user();
        $transactions = $this->Transaction->model()->where('user_id',$user->id)->orderby('created_at','desc')->take(100)->get();
        return $transactions;
    }

    public function searchTransactions(Request $request){
        $request->validate([
            'search_word' => 'nullable|string',
            'from' => 'nullable|string',
            'to' => 'nullable|string',
        ]);
        $keyword = $request['search_word'];
        $from = $request['from'];
        $to = $request['to'];
        $word = explode(' ',strtolower($keyword));
        $user = $this->User->user();

        if(!empty($request['from'])){
            $from = Carbon::parse($request['from']);
            $to = !empty($to) ? Carbon::parse($to ) : today();
            $transactions = $this->Transaction->model()->whereBetween('created_at', [$from." 00:00:00",$to." 23:59:59"])->get();
        }
        else{
            $transactions = $this->Transaction->model()->where('user_id',$user->id)
                                    ->where('reference','Like','%'.$request['search_word'].'%')
                                    ->orWhere('narration','Like','%'.$request['search_word'].'%')
                                    ->get();
            // $transactions = [];
            // foreach($ts as $t){
            //     $check = Str::contains(strtolower($t->status),$word) || Str::contains(strtolower($t->narration),$word) || Str::contains(strtolower($t->reference),$word);
            //     if($check){
            //         array_push($transactions,$t);
            //     }
            // }
        }
        return $transactions;
    }

}
