<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Nwidart\Modules\Facades\Module as ModuleFacade;

class ModulesController extends Controller
{
    public function index()
    {
        $modules = Module::orderBy('priority', 'asc')
            ->orderBy('priority', 'asc')
            ->get()
            ->groupBy('category');

        // Remove any module if its not in the system.
        $modules = $modules->filter(function ($modules) {
            return ModuleFacade::find(strtolower($modules->first()->name));
        });

        return view('backend.pages.modules.index', compact('modules'));
    }

    public function toggleStatus(Module $module)
    {
        $module->update(['status' => ! $module->status]);

        // Find the module in the system.
        $moduleData = ModuleFacade::find(strtolower($module->name));

        if (! $moduleData) {
            return response()->json(['success' => false, 'message' => 'Module not found.'], 404);
        }

        // Enable or disable the module.
        if ($module->status) {
            Artisan::call('module:enable', ['module' => $moduleData->getName()]);
        } else {
            Artisan::call('module:disable', ['module' => $moduleData->getName()]);
        }

        // Clear the cache
        Artisan::call('cache:clear');

        return response()->json(['success' => true, 'status' => $module->status]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'module' => 'required|file|mimes:zip',
        ]);

        $file = $request->file('module');
        $filePath = $file->storeAs('modules', $file->getClientOriginalName());

        // Extract and install the module.
        $modulePath = storage_path('app/'.$filePath);
        $extractPath = base_path('Modules');
        $zip = new \ZipArchive;
        if ($zip->open($modulePath) === true) {
            $moduleName = $zip->getNameIndex(0); // Retrieve the module folder name before closing
            $zip->extractTo($extractPath);
            $zip->close();

            // Remove / from moduleName.
            $moduleName = str_replace('/', '', $moduleName);

            // Register the module in the database.
            $module = ModuleFacade::find(strtolower($moduleName));
            if ($module) {
                // If already exist by slug, update the module.
                Module::updateOrCreate(['slug' => $module->getLowerName()], [
                    'description' => $module->getDescription(),
                    'category' => $module->get('category') ?? 'Uncategorized',
                    'priority' => $module->getPriority(),
                    'version' => $module->get('version') ?? '1.0.0',
                    'icon' => $module->get('icon') ?? 'bi-box',
                    'tags' => $module->get('keywords') ?? $module->get('tags') ?? [],
                    'slug' => $module->getLowerName(),
                    'name' => $module->getStudlyName(),
                    'status' => true,
                ]);

                session()->flash('success', 'Module uploaded and registered successfully.');
            } else {
                session()->flash('error', 'Failed to find the module in the system.');
            }

            // Run the module migrations.
            Artisan::call('module:migrate', ['module' => $moduleName]);

            // Clear the cache
            Artisan::call('cache:clear');

            // Activate the module.
            Artisan::call('module:enable', ['module' => $moduleName]);

            session()->flash('success', 'Module uploaded and installed successfully.');
        } else {
            session()->flash('error', 'Failed to extract the module.');
        }

        return redirect()->route('admin.modules.index');
    }

    public function destroy(Module $module)
    {
        // Find the module in the system.
        $moduleData = ModuleFacade::find(strtolower($module->name));

        if ($moduleData) {
            // Disable the module before deletion.
            Artisan::call('module:disable', ['module' => $moduleData->getName()]);

            // Remove the module files.
            $modulePath = base_path('Modules/'.$moduleData->getName());
            if (is_dir($modulePath)) {
                \File::deleteDirectory($modulePath);
            }
        }

        // Delete the module from the database.
        $module->delete();

        // Clear the cache.
        Artisan::call('cache:clear');

        session()->flash('success', 'Module deleted successfully.');

        return redirect()->route('admin.modules.index');
    }
}
