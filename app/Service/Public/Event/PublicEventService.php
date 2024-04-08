<?php

namespace App\Service\Public\Event;

interface PublicEventService
{
    public function getOverviewEventPopuler();

    public function getOverviewEventAll();

    public function getEventDetail(string $event_id);

    public function getOverviewEventByCategory(string $category);
}