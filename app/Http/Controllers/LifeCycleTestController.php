<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    //
    public function showServiceProviderTest()
    {
        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('password');

        $sample = app()->make('ServiceProviderTest');

        dd($sample, $password, $encrypt->decrypt($password));

    }
    public function showservicecontainertest()
    {
        app()->bind('lifeCycleTest', function(){
           return 'ライフサイクルテスト'; 
        });

        $test = app()->make('lifeCycleTest');
        
        //サービスコンテナなしのパターン
        //$message = new Message();
        //$sample = new sample($message);
        //$sample->run();

        //サービスコンテナappありのパターン
        app()->bind('sample', sample::class);
        $sample = app()->make('sample');
        $sample->run();

        dd($test, app());
    }
}

class sample 
{
    public $message;
    public function __construct(Message $message){
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }    
}
   

class message 
{
    public function send(){
        echo('メッセージ表示');
    }
}