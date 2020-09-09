<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait CreateView
{
    public function createView($pageName)
    {
        $view = $pageName;

        $path = $this->viewPath($view);

        $this->createDir($path);

        if (File::exists($path))
        {
            return redirect()->route('beheer.pages.index')->with('error', 'Pagina kon niet worden aangemaakt!');
        }
        File::put($path, $path);
    }

    /**
     * Get the view full path.
     *
     * @param string $view
     *
     * @return string
     */
    public function viewPath($view)
    {
        $view = str_replace('.', '/', $view) . '.blade.php';

        return resource_path('views/site/pages/' . $view);
    }

    /**
     * Create view directory if not exists.
     *
     * @param $path
     */
    public function createDir($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }
    }
}
