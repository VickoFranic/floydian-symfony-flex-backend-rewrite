<?php
/**
 * Created by PhpStorm.
 * User: vicko
 * Date: 03/03/18
 * Time: 21:39
 */

namespace App\Services;

use App\Library\Enums\FacebookEndpoint;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Facebook\FacebookResponse;

class FacebookService
{
    private $facebook;

    /**
     * FacebookService constructor.
     * @param string $appId
     * @param string $appSecret
     * @param string $appToken
     * @throws \RuntimeException
     */
    public function __construct(string $appId, string $appSecret, string $appToken)
    {
        $this->facebook = $this->init($appId, $appSecret, $appToken);
    }

    /**
     * @param $appId
     * @param $appSecret
     * @param $appToken
     * @return Facebook|null
     * @throws \RuntimeException
     */
    private function init($appId, $appSecret, $appToken): ?Facebook
    {
        try {
            return new Facebook([
                'app_id' => $appId,
                'app_secret' => $appSecret,
                'default_access_token' => $appToken
            ]);
        } catch (FacebookSDKException $e) {
            throw new \RuntimeException('Error instantiating Facebook client');
        }
    }

    /**
     * @return FacebookResponse
     * @throws \RuntimeException
     */
    public function getPosts(): ?FacebookResponse
    {
        try {
            return $this->facebook->get(FacebookEndpoint::POSTS);
        } catch (FacebookSDKException $e) {
            throw new \RuntimeException('Facebook SDK error');
        }
    }

}