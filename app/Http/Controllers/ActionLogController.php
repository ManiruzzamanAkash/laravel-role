<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ActionLogService;

class ActionLogController extends Controller
{
    public function __construct(private readonly ActionLogService $actionLogService)
    {
    }

    public function index()
    {
        $this->checkAuthorization(auth()->user(), ['actionlog.view']);

        return view('backend.pages.action-logs.index', [
            'actionLogs' => $this->actionLogService->getActionLogs(),
        ]);
    }
}
