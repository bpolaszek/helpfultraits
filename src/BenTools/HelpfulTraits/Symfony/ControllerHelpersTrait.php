<?php
namespace BenTools\HelpfulTraits\Symfony;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

trait ControllerHelpersTrait
{

    /**
     * Returns a RedirectResponse to the given URL.
     *
     * @param string $url The URL to redirect to
     * @param int $status The status code to use for the Response
     *
     * @return RedirectResponse
     */
    public function redirect($url, $status = 302)
    {
        return new RedirectResponse($url, $status);
    }

    /**
     * Returns a NotFoundHttpException.
     *
     * This will result in a 404 response code. Usage example:
     *
     *     throw $this->createNotFoundException('Page not found!');
     *
     * @param string $message A message
     * @param \Exception|null $previous The previous exception
     *
     * @return NotFoundHttpException
     */
    public function createNotFoundException($message = 'Not Found', \Exception $previous = null)
    {
        return new NotFoundHttpException($message, $previous);
    }

    /**
     * @param string $message
     * @param \Exception|null $previous
     *
     * @throws NotFoundHttpException
     */
    public function throwNotFoundException($message = 'Not Found', \Exception $previous = null)
    {
        throw $this->createNotFoundException($message, $previous);
    }

    /**
     * Returns an AccessDeniedException.
     *
     * This will result in a 403 response code. Usage example:
     *
     *     throw $this->createAccessDeniedException('Unable to access this page!');
     *
     * @param string $message A message
     * @param \Exception|null $previous The previous exception
     *
     * @return AccessDeniedHttpException
     */
    public function createAccessDeniedException($message = 'Access Denied.', \Exception $previous = null)
    {
        return new AccessDeniedHttpException($message, $previous);
    }

    /**
     * @param string          $message
     * @param \Exception|null $previous
     *
     * @throws AccessDeniedException
     */
    public function throwAccessDeniedException($message = 'Access Denied.', \Exception $previous = null)
    {
        throw $this->createAccessDeniedException($message, $previous);
    }

    /**
     * Checks if the attributes are granted against the current authentication token and optionally supplied object.
     *
     * @param mixed $attributes The attributes
     * @param mixed $object The object
     *
     * @return bool
     *
     * @throws \LogicException
     */
    protected function isGranted($attributes, $object = null)
    {
        if (empty($this->authorizationChecker)) {
            throw new \LogicException('The AuthorizationChecker is not injected.');
        }

        return $this->authorizationChecker->isGranted($attributes, $object);
    }

    /**
     * Throws an exception unless the attributes are granted against the current authentication token and optionally
     * supplied object.
     *
     * @param mixed $attributes The attributes
     * @param mixed $object The object
     * @param string $message The message passed to the exception
     *
     * @throws AccessDeniedException
     */
    protected function denyAccessUnlessGranted($attributes, $object = null, $message = 'Access Denied.')
    {
        if (!$this->isGranted($attributes, $object)) {
            throw $this->createAccessDeniedException($message);
        }
    }

    /**
     * Returns an BadRequestHttpException.
     *
     * This will result in a 400 response code. Usage example:
     *
     *     throw $this->createBadRequestException('Bad request!');
     *
     * @param string $message A message
     * @param \Exception|null $previous The previous exception
     *
     * @return BadRequestHttpException
     */
    public function createBadRequestException($message = 'Bad request.', \Exception $previous = null)
    {
        return new BadRequestHttpException($message, $previous);
    }

    /**
     * @param string $message
     * @param \Exception|null $previous
     *
     * @throws BadRequestHttpException
     */
    public function throwBadRequestException($message = 'Bad request.', \Exception $previous = null)
    {
        throw $this->createBadRequestException($message, $previous);
    }

    /**
     * @param callable $toDoLater
     * @param int $priority
     */
    public function deferAfterResponse(callable $toDoLater, $priority = 0)
    {
        if (empty($this->eventDispatcher)) {
            throw new \LogicException("You can not use deferAfterResponse if the event dispatcher is not injected.");
        }
        $this->eventDispatcher->addListener(KernelEvents::TERMINATE, $toDoLater, $priority);
    }
}
