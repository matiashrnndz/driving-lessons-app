<?php

class SigninException extends Exception {
    
    public function errorMessage($err) {
        return $err;
    }

}

