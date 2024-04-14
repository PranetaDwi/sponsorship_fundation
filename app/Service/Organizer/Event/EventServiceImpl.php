<?php

namespace App\Service\Organizer\Event;

use App\Http\Requests\Organizer\Event\CreateEventFundRequest;
use App\Http\Requests\Organizer\Event\CreateEventInformationRequest;
use App\Http\Requests\Organizer\Event\CreateEventKontraprestasiRequest;
use App\Http\Requests\Organizer\Event\CreateEventPlacementRequest;
use App\Repository\EventPhoto\EventPhotoRepository;
use App\Repository\Event\EventRepository;
use App\Repository\EventCategoryName\EventCategoryNameRepository;
use App\Repository\EventCategory\EventCategoryRepository;
use App\Repository\EventFund\EventFundRepository;
use App\Repository\EventPlacement\EventPlacementRepository;
use App\Repository\Kontraprestasi\KontraprestasiRepository;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class EventServiceImpl implements EventService
{
    protected $eventRepository;
    protected $eventCategoryRepository;
    protected $eventCategoryNameRepository;
    protected $eventPhotoRepository;
    protected $eventFundRepository;
    protected $eventPlacementRepository;
    protected $kontraprestasiRepository;


    public function __construct(
        EventRepository $eventRepository, 
        EventCategoryRepository $eventCategoryRepository, 
        EventCategoryNameRepository $eventCategoryNameRepository, 
        EventPhotoRepository $eventPhotoRepository,
        EventFundRepository $eventFundRepository,
        EventPlacementRepository $eventPlacementRepository,
        KontraprestasiRepository $kontraprestasiRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->eventCategoryRepository = $eventCategoryRepository;
        $this->eventCategoryNameRepository = $eventCategoryNameRepository;
        $this->eventPhotoRepository = $eventPhotoRepository;
        $this->eventFundRepository = $eventFundRepository;
        $this->eventPlacementRepository = $eventPlacementRepository;
        $this->kontraprestasiRepository = $kontraprestasiRepository;
    }
    
    // diatur ulang lagi buset ya
    public function getMyEvents(){
        try{
            return $this->eventRepository->findByOrganizerId(auth()->user()->organizer->id);
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        } catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function getEventCategories()
    {
        try{
            return $this->eventCategoryNameRepository->findAll();
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        } catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function postEventInformation(CreateEventInformationRequest $request){
        $response = [];
        try {
            
            $eventInformation = [
                'organizer_id' => auth()->user()->organizer->id,
                'title' => $request->title,
                'description' => $request->description,
                'target_participants' => $request->target_participants,
                'participant_description' => $request->participant_description,
                'status_event' => $request->status_event,
                'type_event' => $request->type_event,
            ];

            $response['event'] = $this->eventRepository->save($eventInformation);

        }catch (\Exception $exception){
            dd($exception->getMessage());
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }


        if ($request->hasFile('photo_file')) {
            $photo_file = [];
            foreach ($request->file('photo_file') as $file) {
                try {
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $filenameOriginal = 'organizer/events/' . $filename . '_' . time() . '.' . $extension;
                    $path = $file->storeAs('public/' . $filenameOriginal);
                    $photo_file = 'storage/'.$filenameOriginal;
                    
                    $dataPicture = [
                        'event_id' => $response['event']['id'],
                        'photo_file' => $photo_file,
                    ];
                    $photo_file = $this->eventPhotoRepository->save($dataPicture);
                } catch (\Exception $exception) {
                    DB::rollBack();
                    throw new Exception('Something went wrong: ' . $exception->getMessage(), 500);
                }
            }
            $response['photo_files'] = $photo_file;
        }

        try {
            $eventCategory = [];
            if ($request->has('event_category_id')) {
                foreach ($request->event_category_id as $category) {
                    $dataCategory = [
                        'event_id' => $response['event']['id'],
                        'event_category_name_id' => $category,
                    ];
                    $eventCategory[] = $this->eventCategoryRepository->save($dataCategory);
                }   
            }
            $response['event_category_name_id'] = $eventCategory;
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
            throw new Exception('Something went wrong: ' . $exception->getMessage(), 500);
        }

        return $response;
    }

    public function postEventFund(CreateEventFundRequest $request, $event_id){
        $response = [];
        try {
            $eventFund = [
                'event_id' => $event_id,
                'target_fund' => $request->target_fund,
                'sponsor_deadline' => $request->sponsor_deadline,
            ];

            $response['event'] = $this->eventFundRepository->save($eventFund);

        }catch (\Exception $exception){
            dd($exception->getMessage());
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }

        return $response;

    }

    public function postEventPlacement(CreateEventPlacementRequest $request, $event_id){
        $response = [];
        try {
            $eventPlacement = [
                'event_id' => $event_id,
                'event_start_date' => $request->event_start_date,
                'event_end_date' => $request->event_end_date,
                'event_venue' => $request->event_venue,
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
            ];

            $response['event'] = $this->eventPlacementRepository->save($eventPlacement);

        }catch (\Exception $exception){
            dd($exception->getMessage());
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }

        return $response;
    }

    public function postKontraprestasi(CreateEventKontraprestasiRequest $request, $event_id){
        $response = [];
        try {
            $eventKontraprestasi = [
                'event_id' => $event_id,
                'title' => $request->title,
                'min_sponsor' => $request->min_sponsor,
                'max_sponsor' => $request->max_sponsor,
                'feedback' => $request->feedback,
                'icon_photo_kontraprestasi_id' => $request->icon_photo_kontraprestasi_id,
            ];

            $response['kontraprestasi'] = $this->kontraprestasiRepository->save($eventKontraprestasi);
        }catch (\Exception $exception){
            dd($exception->getMessage());
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }

        return $response;
    }

}
