<?php

namespace Spark\Responder;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Spark\Adr\PayloadInterface;
use Spark\Adr\ResponderInterface;

class RedirectResponder implements ResponderInterface
{
    /**
     * @inheritDoc
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        PayloadInterface $payload
    ) {
        if ($this->hasRedirect($payload)) {
            $messages = $payload->getMessages() + [
                'status' => 302,
            ];

            return $response
                ->withStatus($messages['status'])
                ->withHeader('Location', $messages['redirect']);
        }

        return $response;
    }

    /**
     * Check if the payload contains a redirect
     *
     * @param PayloadInterface $payload
     *
     * @return boolean
     */
    private function hasRedirect(PayloadInterface $payload)
    {
        $messages = $payload->getMessages();
        return !empty($messages['redirect']);
    }
}
