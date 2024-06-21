<?php

namespace App\Service\Admin\IconManagement;

use App\Http\Requests\Admin\IconManagement\PostIconRequest;
use App\Repository\IconPhotoKontraprestasi\IconPhotoKontraprestasiRepository;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IconManagementServiceImpl implements IconManagementService
{

    protected $iconPhotoKontraprestasiRepository;

    public function __construct(IconPhotoKontraprestasiRepository $iconPhotoKontraprestasiRepository)
    {
        $this->iconPhotoKontraprestasiRepository = $iconPhotoKontraprestasiRepository;
    }

    public function getIconLists(){
        try{
            return $this->iconPhotoKontraprestasiRepository->findAll();
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        } catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }

    public function postIconKontraprestasi(PostIconRequest $request){
        try{
            // $file = $request->file('photo_file');
            // $filenameWithExt = $file->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $file->getClientOriginalExtension();
            // $filenameOriginal = 'admin/icon-kontrapestasi/' . $filename . '_' . time() . '.' . $extension;
            // $path = $file->storeAs('public/' . $filenameOriginal);
            // $photo_file = 'storage/'.$filenameOriginal;
            $dataPicture = [
                'photo_file' => $request->photo_file,
            ];
            return $this->iconPhotoKontraprestasiRepository->save($dataPicture);
        } catch (\Exception $exception){
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        } catch (AuthorizationException $exception) {
            throw new Exception('You are not authorized to access', 403);
        }catch (ModelNotFoundException $exception) {
            throw new Exception('Model not found', 404);
        }
    }
}