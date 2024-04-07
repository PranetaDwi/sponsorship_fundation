<?php

namespace App\Service\Entrepreneur\Mitra;

use App\Http\Requests\Entrepreneur\Mitra\MitraEnrollmentRequest;
use App\Models\Entrepreneur;
use App\Repository\Mitra\MitraRepository;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MitraServiceImpl implements MitraService
{
    protected $mitraRepository;


    public function __construct(MitraRepository $mitraRepository)
    {
        $this->mitraRepository = $mitraRepository;
    }
    
    public function getmitraLists()
    {
        try {
            $mitraList = $this->mitraRepository->findAll();
            return $mitraList;
        }catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }
    }

    public function postmitraEnrollment(MitraEnrollmentRequest $request, $user_id)
    {
        $validatedData = $request->validated();
        try {
            
            $file = $request->photo_file;
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameOriginal = 'entrepreneur/mitra/' . $filename . '_' . time() . '.' . $extension;
            $path = $file->storeAs('public/' . $filenameOriginal);
            $validatedData['photo_file'] = 'storage/'.$filenameOriginal;
            $mitra = $this->mitraRepository->save($validatedData);
        }catch (\Exception $exception){
            dd($exception->getMessage());
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }

        try {
            $datamitra = [
                'user_id' => $user_id,
                'mitra_id' => $mitra->id
            ];
            $relation = Entrepreneur::create($datamitra);
        }catch (\Exception $exception){
            dd($exception->getMessage());
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }

        $data = [
            'mitra' => $mitra,
            'entrepreneur' => $relation
        ];

        return $data;
        
    }
}