<?php

namespace Spark;

use Arbiter\Action as Arbiter;

class Action extends Arbiter
{
    protected $input = 'Spark\Input';
    protected $responder = 'Spark\Responder\ChainedResponder';

    /**
     * @inheritDoc
     */
    public function __construct(
        $domain,
        $input = null,
        $responder = null
    ) {
        $this->domain = $domain;

        if ($input) {
            $this->input = $input;
        }

        if ($responder) {
            $this->responder = $responder;
        }
    }
}
