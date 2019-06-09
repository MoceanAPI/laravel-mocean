<?php

namespace Mocean\Laravel;

use Mocean\Client;
use Mocean\Client\Credentials\Basic;

/**
 * @mixin Client
 */
class Mocean
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $apiSecret;

    /**
     * @var \Mocean\Client
     */
    protected $mocean;

    /**
     * @param string $apiKey
     * @param string $apiSecret
     */
    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    /**
     * Get the configured mocean sdk object.
     *
     * @return \Mocean\Client
     */
    public function getMocean()
    {
        if ($this->mocean) {
            return $this->mocean;
        }

        return $this->mocean = new Client(new Basic($this->apiKey, $this->apiSecret));
    }

    public function __call($method, $arguments)
    {
        return call_user_func_array([$this->getMocean(), $method], $arguments);
    }
}
