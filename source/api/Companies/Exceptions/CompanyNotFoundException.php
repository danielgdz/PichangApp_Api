<?php

namespace Api\Companies\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CompanyNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('The company was not found.');
    }
}