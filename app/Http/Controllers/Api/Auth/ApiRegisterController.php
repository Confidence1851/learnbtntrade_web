<?php 
namespace App\Http\Controllers\Api\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ApiRegisterController{


//     public function register(Request $request)
//     {
//         $this->validator($request->all())->validate();

//         event(new Registered($user = $this->create($request->all())));

//         $this->guard()->login($user);

//         if ($response = $this->registered($request, $user)) {
//             return $response;
//         }

//         return $request->wantsJson()
//                     ? new Response('', 201)
//                     : redirect($this->redirectPath());
//     }

}



