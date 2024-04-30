<?php

namespace App\Service\Admin\EventCategoryManagement;

use App\Http\Requests\Admin\EventCategoryManagement\PostEventCategoryRequest;
use App\Repository\EventCategoryName\EventCategoryNameRepository;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventCategoryManagementServiceImpl implements EventCategoryManagementService
{

    protected $eventCategoryRepository;

    public function __construct(EventCategoryNameRepository $eventCategoryRepository)
    {
        $this->eventCategoryRepository = $eventCategoryRepository;
    }

    public function getCategoryLists()
    {
        try{
            return $this->eventCategoryRepository->findAll();
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        } catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function postEventCategory(PostEventCategoryRequest $request)
    {
        try{
            $data = $request->validated();
            if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $filenameOriginal = 'admin/icon-event-category/' . $filename . '_' . time() . '.' . $extension;
                $path = $file->storeAs('public/' . $filenameOriginal);
                $photo_file = 'storage/'.$filenameOriginal;
                $data['icon'] = $photo_file;
            }
            return $this->eventCategoryRepository->save($data);
        } catch (\Exception $exception){
            dd($exception->getMessage());
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        } catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }
}