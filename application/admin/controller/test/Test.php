<?php

namespace app\admin\controller\test;

use think\Controller;

use think\Log;

class Test extends Controller
{
    public function index()
    {
        // // create a log channel
        // $log = new Logger('name');
        // $log->pushHandler(new StreamHandler(LOG_PATH.'monolog.log', Logger::WARNING));
        //
        // // add records to the log
        // $log->warning('Foo');
        // $log->error('Bar');
        // Log::error('11111');
    }

    public function test()
    {
        return view('test');
    }
}
