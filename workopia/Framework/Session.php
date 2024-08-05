<?php

namespace Framework;

// These will be static methods as we won't be insaniating anything
// Session are of three types: 0 (Session Disabled) 1 (No Session) 2 (Active Session)
class Session {

    /**
     * Start a session
     * 
     * @return void
     */
    public static function start() {
        if(session_status() == PHP_SESSION_NONE) {
            session_start(); // If there is no session (1) then it'll start session
        }
    }

    /**
     * Set a session key/value pair
     * 
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    /**
     * Get a session value by the key
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    /**
     * Check if session key exists
     * 
     * @param string $key
     * @return bool
     */
    public static function has($key) {
        return isset($_SESSION[$key]);
    }

    /**
     * Clear session by key
     * 
     * @param string $key
     * @return void
     */
    public static function clear($key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    /**
     * Clear all session data
     * 
     * @return void
     */
    public static function clearAll() {
        session_unset();
        session_destroy();
    }

}