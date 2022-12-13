<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

final class Context
{
    private array $storage;

    public function get(string $key): mixed
    {
        return $this->storage[$key];
    }

    public function set(string $key, mixed $value): void
    {
        $this->storage[$key] = $value;
    }

    public function del(string $key): bool
    {
        if (!isset($this->storage[$key])) {
            return false;
        }
        unset($this->storage[$key]);
        return true;
    }
}
