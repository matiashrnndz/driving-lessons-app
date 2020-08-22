<?php

class InstructorRegistrationException extends Exception {
    
    public function errorMessage($err) {
        return $err;
    }

}
