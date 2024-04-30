<?php

namespace App\Providers;

use App\Models\Sponsor;
use Illuminate\Support\ServiceProvider;

use App\Repository\User\UserRepository;
use App\Repository\User\UserRepositoryImpl;
use App\Repository\UserData\UserDataRepository;
use App\Repository\UserData\UserDataRepositoryImpl;
use App\Repository\Mitra\MitraRepository;
use App\Repository\Mitra\MitraRepositoryImpl;
use App\Repository\Organization\OrganizationRepository;
use App\Repository\Organization\OrganizationRepositoryImpl;
use App\Repository\Event\EventRepository;
use App\Repository\Event\EventRepositoryImpl;
use App\Repository\EventPhoto\EventPhotoRepository;
use App\Repository\EventPhoto\EventPhotoRepositoryImpl;
use App\Repository\EventCategory\EventCategoryRepository;
use App\Repository\EventCategory\EventCategoryRepositoryImpl;
use App\Repository\EventCategoryName\EventCategoryNameRepository;
use App\Repository\EventCategoryName\EventCategoryNameRepositoryImpl;
use App\Repository\EventFund\EventFundRepository;
use App\Repository\EventFund\EventFundRepositoryImpl;
use App\Repository\EventPlacement\EventPlacementRepository;
use App\Repository\EventPlacement\EventPlacementRepositoryImpl;
use App\Repository\IconPhotoKontraprestasi\IconPhotoKontraprestasiRepository;
use App\Repository\IconPhotoKontraprestasi\IconPhotoKontraprestasiRepositoryImpl;
use App\Repository\Kontraprestasi\KontraprestasiRepository;
use App\Repository\Kontraprestasi\KontraprestasiRepositoryImpl;
use App\Repository\Sponsor\SponsorRepository;
use App\Repository\Sponsor\SponsorRepositoryImpl;
use App\Service\Admin\EventCategoryManagement\EventCategoryManagementService;
use App\Service\Admin\EventCategoryManagement\EventCategoryManagementServiceImpl;
use App\Service\Admin\IconManagement\IconManagementService;
use App\Service\Admin\IconManagement\IconManagementServiceImpl;
use App\Service\Auth\AuthService;
use App\Service\Auth\AuthServiceImpl;
use App\Service\Common\ProfileManagement\ProfileManagementService;
use App\Service\Common\ProfileManagement\ProfileManagementServiceImpl;
use App\Service\Entrepreneur\Mitra\MitraService;
use App\Service\Entrepreneur\Mitra\MitraServiceImpl;
use App\Service\Organizer\Organization\OrganizationService;
use App\Service\Organizer\Organization\OrganizationServiceImpl;
use App\Service\Organizer\Event\EventService;
use App\Service\Organizer\Event\EventServiceImpl;
use App\Service\Public\Event\PublicEventService;
use App\Service\Public\Event\PublicEventServiceImpl;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(UserDataRepository::class, UserDataRepositoryImpl::class);
        $this->app->bind(MitraRepository::class, MitraRepositoryImpl::class);
        $this->app->bind(OrganizationRepository::class, OrganizationRepositoryImpl::class);
        $this->app->bind(EventRepository::class, EventRepositoryImpl::class);
        $this->app->bind(EventPhotoRepository::class, EventPhotoRepositoryImpl::class);
        $this->app->bind(EventCategoryRepository::class, EventCategoryRepositoryImpl::class);
        $this->app->bind(EventCategoryNameRepository::class, EventCategoryNameRepositoryImpl::class);
        $this->app->bind(EventFundRepository::class, EventFundRepositoryImpl::class);
        $this->app->bind(EventPlacementRepository::class, EventPlacementRepositoryImpl::class);
        $this->app->bind(KontraprestasiRepository::class, KontraprestasiRepositoryImpl::class);
        $this->app->bind(IconPhotoKontraprestasiRepository::class, IconPhotoKontraprestasiRepositoryImpl::class);
        $this->app->bind(SponsorRepository::class, SponsorRepositoryImpl::class);

        $this->app->bind(AuthService::class, AuthServiceImpl::class);
        $this->app->bind(MitraService::class, MitraServiceImpl::class);
        $this->app->bind(OrganizationService::class, OrganizationServiceImpl::class);
        $this->app->bind(EventService::class, EventServiceImpl::class);
        $this->app->bind(PublicEventService::class, PublicEventServiceImpl::class);
        $this->app->bind(IconManagementService::class, IconManagementServiceImpl::class);
        $this->app->bind(ProfileManagementService::class, ProfileManagementServiceImpl::class);
        $this->app->bind(EventCategoryManagementService::class, EventCategoryManagementServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
