<?php

declare(strict_types=1);

namespace Lilith\EventDispatcher;

use Lilith\DependencyInjection\ContainerInterface;

class EventDispatcherProvider
{
    public function __construct(EventDispatcherInterface $eventDispatcher, ContainerInterface $container)
    {
        $eventDispatcherConfig = $container->getParameter('package.event_listeners') ?? [];

        foreach ($eventDispatcherConfig as $event => $listenerList) {
            foreach ($listenerList as $listenerClass => $listenerConfig) {
                $eventDispatcher->addListener(
                    $container->get($listenerClass),
                    $event,
                    $listenerConfig['method'] ?? null,
                    $listenerConfig['priority'] ?? 1,
                );
            }
        }
    }
}
