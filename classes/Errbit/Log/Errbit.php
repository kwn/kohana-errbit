<?php defined('SYSPATH') or die('No direct script access.');

use Errbit\Errbit;

class Errbit_Log_Errbit extends Log_Writer {

    public function write(array $messages)
    {
        $e = Arr::path(array_pop($messages), 'additional.exception');

        Errbit::instance()->notify($e, array(
            'controller' => Request::current()->controller(),
            'action'     => Request::current()->action()
        ));
    }

}
