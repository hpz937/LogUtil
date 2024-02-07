<?php

namespace Hpz937\Logutil;

use Ahc\Cli\Output\Color;

class Log {
    private static $logFile = 'app.log';

    /**
     * Sets the file path for the log file.
     *
     * @param string $logFilePath Path to the log file.
     */
    public static function setLogFile($logFilePath) {
        self::$logFile = $logFilePath;
    }

    /**
     * Logs an informational message.
     *
     * @param string $message The message to be logged.
     */
    public static function info($message) {
        self::writeLog("INFO", $message);
    }

    /**
     * Logs an error message.
     *
     * @param string $message The error message to be logged.
     */
    public static function error($message) {
        self::writeLog("ERROR", $message);
    }

    /**
     * Writes a log entry to either the console or a log file, depending on the execution environment.
     *
     * @param string $level The log level (e.g., 'INFO', 'ERROR').
     * @param string $message The log message.
     */
    private static function writeLog($level, $message) {
        $formattedMessage = "[" . date('Y-m-d H:i:s') . "] $level: $message\n";

        if (self::isCli()) {
            self::outputToConsole($level, $formattedMessage);
        } else {
            file_put_contents(self::$logFile, $formattedMessage, FILE_APPEND);
        }
    }

    /**
     * Determines if the current execution environment is CLI (Command Line Interface).
     *
     * @return bool True if the script is running in a CLI environment, false otherwise.
     */
    private static function isCli() {
        return isset($_ENV['RUN_FROM_CLI']) && $_ENV['RUN_FROM_CLI'] === true;
    }

    /**
     * Sets the value of the RUN_FROM_CLI environment variable.
     *
     * @param bool $value The value to set.
     */
    public static function setRunFromCli($value) {
        $_ENV['RUN_FROM_CLI'] = $value;
    }

    /**
     * Outputs a formatted message to the console.
     *
     * @param string $level The log level (e.g., 'INFO', 'ERROR').
     * @param string $message The message to be output.
     */
    private static function outputToConsole($level, $message) {
        $color = new Color();
        $outputMessage = $level === 'ERROR' ? $color->red($message) : $color->green($message);
        echo $outputMessage;
    }
}