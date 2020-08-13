<?php

class SignupException extends Exception {
    
    public function errorMessage($err) {
        return $err;
    }

}
