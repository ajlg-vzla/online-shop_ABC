<?php

class ErrorC extends MainC
{
    public function showError($message = 'No information about the error')
    {
        $parameters =
        [
            'message' => $message
        ];
        $this->view('error', $parameters);
        //echo '<pre>'.print_r($message,1).'</pre>';	
    }
}