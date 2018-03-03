<?php
/**
 * Created by PhpStorm.
 * User: vicko
 * Date: 03/03/18
 * Time: 22:14
 */

namespace App\EventListener;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event): void
    {
        if (! $event->isMasterRequest()) {
            return;
        }

        $exception = $event->getException();

        $message = $exception->getMessage() ?? 'Unknown error occurred';
        $code = $exception->getCode() !== 0 ? $exception->getCode() : Response::HTTP_INTERNAL_SERVER_ERROR;

        $event->setResponse(new JsonResponse(['message' => $message, 'code' => $code], $code));
    }
}