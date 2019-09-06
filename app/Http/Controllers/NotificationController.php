<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificationEvent;


class NotificationController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function notification(Request $request)
    {   
        try{
            $this->validate($request,['notification' => 'required']);
            event(new NotificationEvent($request->notification));
            return response()->json(['error' => false],200);
        }catch(\Exception $e){
            \Log::alert($e->getMessage());
            return response()->json(['error' => true],500);
        }
    }

}
