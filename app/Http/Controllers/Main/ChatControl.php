<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

abstract class ChatControl extends Controller
{
    public function get_(){
        $agents = $this->User->model()->where('id', '<>', $this->User->user()->id)->where('role', 1)->orderby('name' , 'asc')->get([ 'id' , 'name' , 'avatar' , 'whatsapp']);
        foreach($agents as $agent){
            if(empty($agent->avatar)){
                $agent['avatar'] = 'https://www.wrappixel.com/ampleadmin/assets/images/users/4.jpg' ;
            }

        }

        return 'hi';
    }

    public function agentChats(){
        $agents = $this->User->model()->where('id', '<>', $this->User->user()->id)->where('role', 1)->orderby('name' , 'asc')->get([ 'id' , 'name' , 'avatar' ]);
        foreach($agents as $agent){
            if(empty($agent->avatar)){
                $agent['avatar'] = 'https://www.wrappixel.com/ampleadmin/assets/images/users/4.jpg' ;
            }

            $request = ['receiver_id' => $agent->id , 'isTyping' => 0];
            $agent['chat'] = $this->fetchChatMessages($request);
        }

        return $agents;
    }


    // public function fetchChats(){
    //     $user = $this->User->user();
    //     $chats = $this->Chat->torderby('updated_at' , 'desc')->get();
    //     return $chats;
    // }

    public function startChat(Request $request){

        $data = Validator::make($request->all(),[
            'receiver_id' => 'required|string',
            'isTyping' => 'required|string',
        ]);

        if($data->fails()){
            return [
                'success' => false ,
                'msg'=> 'No user selected!',
                'code' => 400
            ];
        }
        return $this->fetchChatMessages($request);
    }

    public function fetchChatMessages($request){

        $receiver_id = $request['receiver_id'];
        $isTyping = $request['isTyping'];

        $user =  $this->User->user();
        $chat = $this->Chat->twhere('user_id' , $user->id )->where('receiver_id' , $receiver_id)->first();
        if(empty($chat)){
            $chat = $this->Chat->twhere('user_id' , $receiver_id )->where('receiver_id' , $user->id)->first();
        }

        if(empty($chat)){
            if($user->id != $receiver_id){
                $chat = $this->Chat->tcreate([
                'user_id' => $user->id,
                'receiver_id' => $receiver_id,
              ]);
            }
        }





            $chatUser = [
                'id' => $chat->user->id,
                'name' => $chat->user->name,
                'avatar' => 'https://www.wrappixel.com/ampleadmin/assets/images/users/4.jpg',
                'isTyping' => '0',
                'color' => 'green',
                'containerColor' => ''
            ];

            // if($isTyping == 1){
            //     $isTyping = $me['name'].' is typing....';
            // }
            // else{
            //     $isTyping = '';
            // }

            $chatReceiver = [
                'id' => $chat->receiver->id,
                'name' => $chat->receiver->name,
                'avatar' => 'https://www.wrappixel.com/ampleadmin/assets/images/users/4.jpg',
                'isTyping' => '1',
                'color' => 'white',
                'containerColor' => ''
            ];

        if($user->id == $chat->user_id){
            $returnUser = $chatUser;
            $returnReceiver = $chatReceiver;
        }
        else{
            $returnUser = $chatReceiver;
            $returnReceiver = $chatUser;
        }

        $messages = $this->ChatMessage->model()->where('chat_id' , $chat->id)->get();


        return [
            'chat_id' => $chat->id,
            'user' => $returnUser,
            'receiver' => $returnReceiver,
            'success' => true ,
            'messages' => $messages,
            'msg'=> '',
            'code' => 200,
        ];
    }

    // public function fetchChatMessages(Request $request){

    //      $data = Validator::make($request->all(),[
    //         'chat_id' => 'required|string',
    //     ]);

    //     if($data->fails()){
    //         return ['error'];
    //     }
    //     $chats = $this->ChatMessage->model()->get();
    //     return $chats;
    //  }

    public function sendChatMessage(Request $request){

        $data = Validator::make($request->all(),[
            'chat_id' => 'required|string',
            'message' => 'required|string',
        ]);

        if($data->fails()){
            return [
                'success' => false ,
                'msg'=> 'An error occurred from the server!',
                'code' => 400
            ];
        }

        $user =  $this->User->user();
        $chat = $this->Chat->tfind($request['chat_id']);
        if(empty($chat)){
            return [
                'success' => false ,
                'msg'=> 'An error occurred from the server!',
                'code' => 400
            ];
        }

        $this->ChatMessage->model()->create([
            'chat_id' => $chat->id,
            'sender_id' => $user->id,
            'message' => $request['message'],
        ]);

        $chat->save();


        return [
            'success' => true ,
            'msg'=> '',
            'code' => 200,
        ];
    }
}


