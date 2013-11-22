<?php defined('SYSPATH') or die('No direct script access.');

class Errbit_Log_Errbit extends Log_Writer {

    public function __construct()
    {
    }

	public function write(array $messages)
	{
	    $e = new Exception();
	
        Errbit::instance()->notify($e, array(
            'controller' => Request::current()->controller(),
            'action'     => Request::current()->action()
        ));
	}

}
