<?php

/**
 * A conversion to a string value.
 */
class afToStringConversion {
    private static
        $instance = null;

    private function __construct() {
    }

    public function convert($value) {
        if($value === null) {
            return null;
        }
        return (string)$value;
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

