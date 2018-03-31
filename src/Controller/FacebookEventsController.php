<?php
/**
 * Created by PhpStorm.
 * User: vicko
 * Date: 03/03/18
 * Time: 22:58
 */

namespace App\Controller;


use App\Services\FacebookService;
use Facebook\FacebookResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class FacebookEventsController
{
    /**
     * @Route("/facebook/events")
     * @Method("GET")
     *
     * @param FacebookService $facebookService
     * @return JsonResponse
     * @throws \RuntimeException
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function indexAction(FacebookService $facebookService): JsonResponse
    {
        /** @var FacebookResponse $events */
        $events = $facebookService->getEvents();

        return new JsonResponse($events->getDecodedBody());
    }

    /**
     * @Route("/facebook/events/{id}")
     * @Method("GET")
     *
     * @param string $id
     * @param FacebookService $facebookService
     * @return JsonResponse
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function getEventDetailsAction(string $id, FacebookService $facebookService): JsonResponse
    {
        /** @var FacebookResponse $eventDetails */
        $eventDetails = $facebookService->getEventDetails($id);

        return new JsonResponse($eventDetails->getDecodedBody());
    }
}