<?php

class InstructorException extends Exception {
    
    public function errorMessage($err) {
        return $err;
    }

}
