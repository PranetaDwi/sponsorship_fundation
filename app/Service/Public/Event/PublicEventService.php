<?php

namespace App\Service\Public\Event;

interface PublicEventService
{
    public function getOverviewEventPopuler();

    public function getOverviewEventAll();

    public function getOverviewEventByCategory($category_id);

    public function getDetailEventInformation($event_id);

    public function getListEventKontraprestasi($event_id);

    public function getDetailEventKontraprestasi($id, $event_id);

    public function getListEventMitra($event_id);
}