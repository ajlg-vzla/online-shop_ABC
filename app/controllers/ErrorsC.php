<?php

class ErrorsC extends MainC
{
    public function showError($message = 'No information about the error')
    {
        $parameters =
        [
            'message' => $message
        ];
        $this->view('error', $parameters);	
    }
}