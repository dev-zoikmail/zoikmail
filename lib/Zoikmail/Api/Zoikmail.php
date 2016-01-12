<?php

namespace Zoikmail\Api;

use Zoikmail\HttpClient\HttpClient;

class Zoikmail
{

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * @param HttpClient $client
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Email Verification
     *
     * '/verify?email=:email&timeout=:timeout' GET
     *
     * @param string $email Email address to verify
     * @param array $options
     * @return \Zoikmail\HttpClient\Response
     */
    public function verify($email,$api, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());

        $timeout = (isset($options['timeout']) ? $options['timeout'] : 60000);

        $response = $this->client->get('secure/ssl/verify/index.php?email='.rawurlencode($email).'&timeout='.$timeout.'&apikey='.$api.'&mode=1', $body, $options);
		//$response = $this->client->get('/verify?email='.rawurlencode($email).'&timeout='.$timeout.'', $body, $options);

        return $response;
    }

}
?>
