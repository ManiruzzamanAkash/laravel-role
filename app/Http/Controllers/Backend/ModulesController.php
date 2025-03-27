<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nwidart\Modules\Facades\Module as ModuleFacade;

class ModulesController extends Controller
{
    public function index()
    {
        $modules = Module::orderBy('priority', 'asc')->get()->groupBy('category');

        return view('backend.pages.modules.index', compact('modules'));
    }

    public function toggleStatus(Module $module)
    {
        $module->update(['status' => !$module->status]);

        return response()->json(['success' => true, 'status' => $module->status]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'module' => 'required|file|mimes:zip',
        ]);

        $file = $request->file('module');
        $filePath = $file->storeAs('modules', $file->getClientOriginalName());

        // Extract and install the module
        $modulePath = storage_path('app/' . $filePath);
        $extractPath = base_path('Modules');
        $zip = new \ZipArchive();
        if ($zip->open($modulePath) === true) {
            $zip->extractTo($extractPath);
            $zip->close();

            // Register the module in the database
            $moduleName = $zip->getNameIndex(0); // Assuming the module folder is the first entry
            $moduleConfig = ModuleFacade::find($moduleName)->get('module.json');
            Module::create([
                'name' => $moduleConfig['name'],
                'description' => $moduleConfig['description'] ?? '',
                'status' => false, // Default to disabled
            ]);

            session()->flash('success', 'Module uploaded and registered successfully.');
        } else {
            session()->flash('error', 'Failed to extract the module.');
        }

        return redirect()->route('admin.modules.index');
    }
}
