<?php

class SignupControllerException extends Exception {
    
    public function errorMessage($err) {
        return $err;
    }

}
