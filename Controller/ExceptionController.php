<?php

namespace Controller;

use Library\Controller;
use Library\Request;

class ExceptionController extends Controller
{
    public function handleAction(Request $request, \Exception $exception)
    {
        return $this->render('handle.phtml', ['request' => $request, 'exception' => $exception] );
    }
}