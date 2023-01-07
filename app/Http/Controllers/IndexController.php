<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->noToast){
            return view('index');
        }

        sleep(1);

        $toast = Toast::title('You are at Home!');

        switch ($request->type){
            case 'danger':
                $toast->danger();
                break;
            case 'warning':
                $toast->warning();
                break;
        }

        if($request->backdrop){
            $toast->backdrop();
        }

        if($request->leftTop){
            $toast->leftTop();
        }

        if($request->center){
            $toast->center();
        }

        $toast->autoDismiss(2);

        return view('index');
    }
}
