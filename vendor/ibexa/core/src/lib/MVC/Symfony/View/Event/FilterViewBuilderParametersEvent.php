<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Core\MVC\Symfony\View\Event;

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * An event that collects the parameters the ViewBuilder will be provided to build View objects.
 */
class FilterViewBuilderParametersEvent extends Event
{
    /** @var \Symfony\Component\HttpFoundation\Request */
    private $request;

    /**
     * Parameters the ViewBuilder will use.
     *
     * @var \Symfony\Component\HttpFoundation\ParameterBag
     */
    private $parameters;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->parameters = new ParameterBag();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Returns the ParameterBag that holds the ViewBuilder's parameters.
     *
     * @return \Symfony\Component\HttpFoundation\ParameterBag
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}

class_alias(FilterViewBuilderParametersEvent::class, 'eZ\Publish\Core\MVC\Symfony\View\Event\FilterViewBuilderParametersEvent');
