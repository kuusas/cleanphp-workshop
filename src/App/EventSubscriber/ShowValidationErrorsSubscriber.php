<?php
namespace App\EventSubscriber;

use App\Validator\ValidatorViolationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ShowValidationErrorsSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => ['returnErrorResponse', 5],
        ];
    }

    public function returnErrorResponse(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if (!$exception instanceof ValidatorViolationException) {
            return;
        }

        $response = new JsonResponse(['errors' => $exception->getErrors()], JsonResponse::HTTP_BAD_REQUEST);
        $event->setResponse($response);
    }
}
