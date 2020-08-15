<?php

class ClassListControllerException extends Exception {
    
    public function errorMessage($err) {
        return $err;
    }

}
