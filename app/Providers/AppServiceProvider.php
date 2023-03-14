<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Livewire\Setup;
use App\Models\ApiToken;
use App\Models\User;
use Cornatul\Marketing\Base\Facades\MarketingPortal;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //implement the feed interface


    }

    public function boot(): void
    {

        Paginator::useBootstrap();

        MarketingPortal::setCurrentWorkspaceIdResolver(
            static function () {
                /** @var User $user */
                $user = auth()->user();
                $request = request();
                $workspaceId = null;

                if ($user && $user->currentWorkspaceId()) {
                    $workspaceId = $user->currentWorkspaceId();
                } else if ($request && (($apiToken = $request->bearerToken()) || ($apiToken = $request->get('api_token')))) {
                    $workspaceId = ApiToken::resolveWorkspaceId($apiToken);
                }


                return $workspaceId ?? 1;
            }
        );

        MarketingPortal::setSidebarHtmlContentResolver(
            static function () {
                return view('layouts.sidebar.manageUsersMenuItem')->render();
            }
        );

        MarketingPortal::setHeaderHtmlContentResolver(
            static function () {
                return view('layouts.header.userManagementHeader')->render();
            }
        );

        Livewire::component('setup', Setup::class);
    }
}
