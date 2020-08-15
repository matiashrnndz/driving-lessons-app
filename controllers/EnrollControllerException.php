<?php

class EnrollControllerException extends Exception {
    
    public function errorMessage($err) {
        return $err;
    }

}
