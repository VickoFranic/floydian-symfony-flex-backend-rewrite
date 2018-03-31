<?php
/**
 * Created by PhpStorm.
 * User: vicko
 * Date: 03/03/18
 * Time: 21:01
 */

namespace App\Controller;


use App\Services\FacebookService;
use Facebook\FacebookResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class FacebookPostsController extends Controller
{
    /**
     * @Route("/facebook/posts")
     * @Method("GET")
     *
     * @param FacebookService $facebookService
     * @return JsonResponse
     * @throws \RuntimeException
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function indexAction(FacebookService $facebookService): JsonResponse
    {
        /** @var FacebookResponse $posts */
        $posts = $facebookService->getPosts();

        return new JsonResponse($posts->getDecodedBody());
    }
}