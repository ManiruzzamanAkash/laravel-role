<?php

namespace App\Http\Controllers;

use App\Models\ActionLogModel;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    public function index()
    {
        $actionLogs = ActionLogModel::paginate(1);
        return view('backend.pages.actionLog',compact('actionLogs'));
    }
}
