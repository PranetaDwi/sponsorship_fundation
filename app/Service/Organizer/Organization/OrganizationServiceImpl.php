<?php

namespace App\Service\Organizer\Organization;

use App\Http\Requests\Organizer\Organization\OrganizationEnrollmentRequest;
use App\Models\Organizer;
use App\Repository\Organization\OrganizationRepository;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrganizationServiceImpl implements OrganizationService
{
    protected $organizationRepository;


    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }
    
    public function getOrganizationLists()
    {
        try {
            $organizationList = $this->organizationRepository->findAll();
            return $organizationList;
        }catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function postOrganizationEnrollment(OrganizationEnrollmentRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $file = $request->photo_file;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameOriginal = 'organizer/organization/' . $filename . '_' . time() . '.' . $extension;
            $path = $file->storeAs('public/' . $filenameOriginal);
            $validatedData['photo_file'] = 'storage/'.$filenameOriginal;
            $organizer = $this->organizationRepository->save($validatedData);
            return $organizer;
        }catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function addOrganization(string $id)
    {
        try {
            $userId = auth()->user()->id;
            $data = [
                'user_id' => $userId,
                'organization_id' => $id
            ];
            $organization = Organizer::create($data);
            return $organization;
        }catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }
}