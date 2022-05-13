<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentTestController extends Controller
{
    //
    public function showComponent1(){
        return view('tests.component-test1');
    }

    public function showcomponent2(){
        return view('tests.component-test2');
    }
}
