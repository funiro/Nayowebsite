<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function customErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "<div style='background: #f8d7da; padding: 15px; border-radius: 4px; margin: 10px;'>";
    echo "<strong>Error:</strong> [$errno] $errstr<br>";
    echo "<strong>File:</strong> $errfile<br>";
    echo "<strong>Line:</strong> $errline<br>";
    echo "</div>";
    
    // Don't execute PHP internal error handler
    return true;
}

function customExceptionHandler($exception) {
    echo "<div style='background: #f8d7da; padding: 15px; border-radius: 4px; margin: 10px;'>";
    echo "<strong>Exception:</strong> " . $exception->getMessage() . "<br>";
    echo "<strong>File:</strong> " . $exception->getFile() . "<br>";
    echo "<strong>Line:</strong> " . $exception->getLine() . "<br>";
    echo "</div>";
}

// Set error handlers
set_error_handler('customErrorHandler');
set_exception_handler('customExceptionHandler');
?>
