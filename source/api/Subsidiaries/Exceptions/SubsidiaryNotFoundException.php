<?php

namespace Api\Subsidiaries\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SubsidiaryNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('The subsidiary was not found.');
    }
}