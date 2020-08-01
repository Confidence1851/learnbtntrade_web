<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\ChatControl;
use Illuminate\Http\Request;

class ChatController extends ChatControl
{
    public function fetch_agents(){
        $data = $this->agentChats();
        return response()->json($data,$this->successResponse );
    }

    public function agent_chats(){
        $data = $this->agentChats();
        return response()->json($data,$this->successResponse );
    }

    public function start_chat(Request $request){
        $data = $this->startChat($request);
        return response()->json($data ,$data['code']);
    }

    public function fetch_chat_messages(Request $request){
        $data = $this->fetchChatMessages($request);
        return response()->json($data,$this->successResponse );
    }

    public function send_chat_message(Request $request){
        $data = $this->sendChatMessage($request);
        return response()->json($data ,$data['code']);
    }

    public function delete_chat_message(Request $request){
        $data = $this->deleteChatMessage($request);
        return response()->json($data ,$data['code']);
    }

}
