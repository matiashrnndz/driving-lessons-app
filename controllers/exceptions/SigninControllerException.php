<?php

class SigninControllerException extends Exception {
    
    public function errorMessage($err) {
        return $err;
    }

}

