<?php

namespace App\Service\Public\Event;

use App\Repository\Event\EventRepository;
use App\Repository\Kontraprestasi\KontraprestasiRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PublicEventServiceImpl implements PublicEventService
{
    protected $eventRepository;
    protected $kontraprestasiRepository;

    public function __construct(
        EventRepository $eventRepository,
        KontraprestasiRepository $kontraprestasiRepository)

    {
        $this->eventRepository = $eventRepository;
        $this->kontraprestasiRepository = $kontraprestasiRepository;
    }

    public function getOverviewEventPopuler(){
        try{
            // find-nya harus berdasarkan mitra paling banyak yg donor..... itu di atur lagi nanti di repositorynya..
            return $this->eventRepository->findAll();
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function getOverviewEventAll(){
        try{
            return $this->eventRepository->findAll();
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function getOverviewEventByCategory($category){
        
    }

    public function getDetailEventInformation($event_id){
        try{
            return $this->eventRepository->findById($event_id);
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function getListEventKontraprestasi($event_id){
        try{
            return $this->kontraprestasiRepository->findByEventId($event_id);
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function getDetailEventKontraprestasi($event_id, $id){
        try{
            return $this->kontraprestasiRepository->findByIdAndEventId($event_id, $id);
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function getListEventMitra($event_id){

    }
}