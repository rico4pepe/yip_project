<?php

class Sanitize {
    public static function sanitizeString($input) {
        // Remove tags and special characters
        $sanitizedString = strip_tags($input);
        $sanitizedString = htmlspecialchars($sanitizedString, ENT_QUOTES, 'UTF-8');

 

        return $sanitizedString;
    }

    public static function sanitizeEmail($input) {
        // Sanitize and validate email address
        $sanitizedEmail = filter_var($input, FILTER_SANITIZE_EMAIL);

        return $sanitizedEmail;
    }

    public static function sanitizeInteger($input) {
        // Remove non-digit characters and sanitize
        
        $sanitizedInteger = filter_var($input, FILTER_SANITIZE_NUMBER_INT);

        return $sanitizedInteger;
    }

    public static function validateUsername($username) {
        // Remove tags and special characters
        $sanitizedUsername = self::sanitizeString($username);
    
        // Validate alphanumeric and length
        if (preg_match('/^(?=.*\d)[a-zA-Z0-9]{3,20}$/', $sanitizedUsername)) 
        { 
            return $sanitizedUsername; 
        } else {
            return false;
        } 
    }

    public static function validatePassword($password) {
        // Validate password length and complexity
        if (strlen($password) >= 8 && preg_match('/[A-Z]+/', $password) && preg_match('/[a-z]+/', $password) && preg_match('/[0-9]+/', $password)) {
            return true; // Password is valid
        } 
    }

}
