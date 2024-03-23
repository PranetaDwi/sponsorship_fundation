<?php

namespace App\Service\Entrepreneur\Umkm;

use App\Http\Requests\Entrepreneur\Umkm\UmkmEnrollmentRequest;
use App\Models\Entrepreneur;
use App\Repository\Umkm\UmkmRepository;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UmkmServiceImpl implements UmkmService
{
    protected $umkmRepository;


    public function __construct(UmkmRepository $umkmRepository)
    {
        $this->umkmRepository = $umkmRepository;
    }
    
    public function getumkmLists()
    {
        try {
            $umkmList = $this->umkmRepository->findAll();
            return $umkmList;
        }catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function postumkmEnrollment(UmkmEnrollmentRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $file = $request->photo_file;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameOriginal = 'entrepreneur/umkm/' . $filename . '_' . time() . '.' . $extension;
            $path = $file->storeAs('public/' . $filenameOriginal);
            $validatedData['photo_file'] = 'storage/'.$filenameOriginal;
            $umkm = $this->umkmRepository->save($validatedData);
            return $umkm;
        }catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function addUmkm(string $id)
    {
        try {
            $userId = auth()->user()->id;
            $data = [
                'user_id' => $userId,
                'umkm_id' => $id
            ];
            $umkm = Entrepreneur::create($data);
            return $umkm;
        }catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }
}