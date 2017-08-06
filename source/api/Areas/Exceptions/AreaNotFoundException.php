<?php

namespace Api\Areas\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AreaNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('The area was not found.');
    }
}