<?php

namespace Zoikmail;

use Zoikmail\HttpClient\HttpClient;

class Client
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @param array $auth
     * @param array $options
     */
    public function __construct($auth = array(), array $options = array())
    {
        $this->httpClient = new HttpClient($auth, $options);
    }

    /**
     * @return Api\Zoikmail
     */
    public function zoikmail()
    {
        return new Api\Zoikmail($this->httpClient);
    }

}
?>
