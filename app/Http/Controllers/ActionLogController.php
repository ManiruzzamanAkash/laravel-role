<?php

namespace App\Http\Controllers;

use App\Models\ActionLogModel;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    public function index()
    {
        $this->checkAuthorization(auth()->user(), ['actionlog.view']);
        
        $query = ActionLogModel::query();
        $search = request()->input('search');
        
        if ($search) {
            $query->where('type', 'like', "%{$search}%")
                ->orWhere('title', 'like', "%{$search}%");
        }
    
        $actionLogs = $query->latest()->paginate(10);
        return view('backend.pages.actionLog', compact('actionLogs'));
    }
    
}
