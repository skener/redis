<?php

namespace Redis;

const DEFAULT_TTL = 120;

class RedisCache
{

    private $redis;

    public function __construct()
    {
        $this->redis = new \Predis\Client('127.0.0.1:6379');
        //$this->redis = new \Predis\Client('tcp://redis:6379');
    }

    public function read($key)
    {
        return $this->redis->get($key);
    }

    public function write($key, $value)
    {
        $this->redis->set($key, $value);
        return $value;
    }

    public function expire($key, $seconds = DEFAULT_TTL)
    {
        return $this->redis->expire($key, $seconds);
    }
}