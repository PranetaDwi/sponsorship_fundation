<?php

namespace App\Service\Public\Event;

use App\Repository\Event\EventRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PublicEventServiceImpl implements PublicEventService
{
    protected $eventRepository;

    public function __construct(
        EventRepository $eventRepository)

    {
        $this->eventRepository = $eventRepository;
    }

    public function getOverviewEventPopuler(){
        try{
            return $this->eventRepository->findAll();
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function getOverviewEventAll(){

    }

    public function getEventDetail(string $event_id){

    }

    public function getOverviewEventByCategory(string $category){
        
    }
}