import fs from 'fs/promises';
import path from 'path';
import { fileURLToPath, pathToFileURL } from 'url';

// Derive __dirname from import.meta.url
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

async function collectModuleAssetsPaths(paths, modulesPath) {
  const mainPaths = paths || [];
  modulesPath = path.join(__dirname, modulesPath);

  const moduleStatusesPath = path.join(__dirname, 'modules_statuses.json');

  try {
    // Read module_statuses.json
    const moduleStatusesContent = await fs.readFile(moduleStatusesPath, 'utf-8');
    const moduleStatuses = JSON.parse(moduleStatusesContent);

    // Read module directories
    const moduleDirectories = await fs.readdir(modulesPath);

    for (const moduleDir of moduleDirectories) {
      if (moduleDir === '.DS_Store' || moduleDir === '__MACOSX') {
        // Skip .DS_Store directory
        continue;
      }

      // Check if the module is enabled (status is true)
      if (moduleStatuses[moduleDir] === true) {
        const viteConfigPath = path.join(modulesPath, moduleDir, 'vite.config.js');

        try {
          await fs.access(viteConfigPath); // Check if the file exists and is accessible
        } catch (error) {
          console.error(`vite.config.js not found or inaccessible for module ${moduleDir}: ${error.message}`);
          continue; // Skip this module if the file is not accessible
        }

        // Convert to a file URL for Windows compatibility
        const moduleConfigURL = pathToFileURL(viteConfigPath);

        // Import the module-specific Vite configuration
        const moduleConfig = await import(moduleConfigURL.href);

        if (moduleConfig.default && moduleConfig.default.paths && Array.isArray(moduleConfig.default.paths)) {
          mainPaths.push(...moduleConfig.default.paths);
        } else {
          console.error(`Error: module ${moduleDir} does not have a paths array in vite.config.js`);
        }
      }
    }
  } catch (error) {
    console.error(`Error reading module statuses or module configurations: ${error}`);
  }

  return mainPaths;
}

export default collectModuleAssetsPaths;
