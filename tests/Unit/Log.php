<?php

class Log
{

    public static function error(string $message)
    {
        $logFilePath = '/app/Logs/error.log';
        $logFile = fopen($logFilePath, 'a');
        if ($logFile) {
            $timestamp = date('Y-m-d H:i:s');
            $logMessage = "[$timestamp] Error: $message\n";
            fwrite($logFile, $logMessage);
            fclose($logFile);
        }
    }
}
