<?php

namespace App\Service\Organizer\Event;

use App\Http\Requests\Organizer\Event\CreateNewEventRequest;
use App\Repository\EventPhoto\EventPhotoRepository;
use App\Repository\Event\EventRepository;
use App\Repository\EventCategoryName\EventCategoryNameRepository;
use App\Repository\EventCategory\EventCategoryRepository;
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


    public function __construct(
        EventRepository $eventRepository, 
        EventCategoryRepository $eventCategoryRepository, 
        EventCategoryNameRepository $eventCategoryNameRepository, 
        EventPhotoRepository $eventPhotoRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->eventCategoryRepository = $eventCategoryRepository;
        $this->eventCategoryNameRepository = $eventCategoryNameRepository;
        $this->eventPhotoRepository = $eventPhotoRepository;
    }
    
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

    public function postEvents(CreateNewEventRequest $request){
        DB::beginTransaction();
        $response = [];
        try {
            $eventData = [
                'organizer_id' => auth()->user()->organizer->id,
                'title' => $request->title,
                'description' => $request->description,
                'target_fund' => $request->target_fund,
                'donation_deadline' => $request->donation_deadline,
                'event_start_date' => $request->event_start_date,
                'event_end_date' => $request->event_end_date,
                'event_venue' => $request->event_venue,
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'target_participants' => $request->target_participants,
                'participant_description' => $request->participant_description,
                'status_event' => $request->status_event,
            ];

            $response['event'] = $this->eventRepository->save($eventData);

        }catch (\Exception $exception){
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
            DB::rollBack();
            throw new Exception('Something went wrong: ' . $exception->getMessage(), 500);
        }

        DB::commit();
        return $response;  
    }

    public function editEvents(string $id){

    }

    public function addEventProof(string $id){

    }

    public function deleteEvent(string $id){

    }
}
