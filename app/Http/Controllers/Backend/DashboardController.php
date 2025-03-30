<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Charts\UserChartService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $this->checkAuthorization(auth()->user(), ['dashboard.view']);

        $chartFilterPeriod = request()->get('chart_filter_period', 'last_12_months');

        return view(
            'backend.pages.dashboard.index',
            [
                'total_users' => User::count(),
                'total_roles' => Role::count(),
                'total_permissions' => Permission::count(),
                'user_growth_data' => app()->make(UserChartService::class)->getUserGrowthData($chartFilterPeriod)->getData(true),
            ]
        );
    }
}
