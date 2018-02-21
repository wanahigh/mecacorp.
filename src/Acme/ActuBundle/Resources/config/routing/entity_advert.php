<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('entity_advert_index', new Route(
    '/',
    array('_controller' => 'AcmeActuBundle:Entity\Advert:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('entity_advert_show', new Route(
    '/{id}/show',
    array('_controller' => 'AcmeActuBundle:Entity\Advert:show'),
    array(),
    array(),
    '',
    array(),
    array('GET|POST')
));

$collection->add('entity_advert_new', new Route(
    '/new',
    array('_controller' => 'AcmeActuBundle:Entity\Advert:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('entity_advert_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AcmeActuBundle:Entity\Advert:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('entity_advert_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AcmeActuBundle:Entity\Advert:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;
