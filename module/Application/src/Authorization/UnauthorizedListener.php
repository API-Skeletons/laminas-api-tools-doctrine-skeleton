<?php

namespace Application\Authorization;

use Laminas\Http\Request as HttpRequest;
use Laminas\Http\Response as HttpResponse;
use Laminas\Http\Header\Accept as AcceptHeader;
use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\ApiProblem\ApiProblemResponse;
use Laminas\ApiTools\MvcAuth\MvcAuthEvent;

class UnauthorizedListener
{
    /**
     * Determine if we have an authorization failure, and, if so, return a 403 response for text/html
     */
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        if ($mvcAuthEvent->isAuthorized()) {
            return;
        }

        $mvcEvent = $mvcAuthEvent->getMvcEvent();
        $request = $mvcEvent->getRequest();
        $response = $mvcEvent->getResponse();

        if ($request instanceof HttpRequest
            && $response instanceof HttpResponse
            && $request->getHeader('accept') instanceof AcceptHeader
            && $request->getHeader('accept')->hasMediaType('text/html')
        ) {
            $mvcAuthEvent->stopPropagation();
            $response->setStatusCode(403);
            $model = $mvcEvent->getViewModel();
            $model->setTemplate('error/403');

            $viewRenderer = $mvcEvent->getApplication()->getServiceManager()->get('ViewRenderer');
            $response->setContent($viewRenderer->render($model));

            return $response;
        }
    }
}
