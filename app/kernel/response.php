<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

class Response
{
    public function json(mixed $message): void
    {
        header('Content-Type: application/json;charset=utf-8');
        $this->send(json_encode($message));
    }

    public function text(string $message): void
    {
        header('Content-Type: text/plain;charset=utf-8');
        $this->send($message);
    }

    private function send(string $message): void
    {
        echo $message;
    }
}
