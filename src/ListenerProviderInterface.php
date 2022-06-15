<?php

declare(strict_types=1);

namespace Lilith\EventDispatcher;

interface ListenerProviderInterface
{
    public function getListenersForEvent(object $event) : iterable;
}
