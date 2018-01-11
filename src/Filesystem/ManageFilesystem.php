<?php

namespace JeroenG\TestAssist\Filesystem;

trait ManageFilesystem
{
    /**
     * Remove given directory and everything in it.
     *
     * @param string $path
     * @return void
     */
    public function removeDir(string $path)
    {
        $files = array_diff(scandir($path), ['.', '..']);
        foreach ($files as $file) {
            if (is_dir("$path/$file")) {
                $this->removeDir("$path/$file");
            } else {
                @chmod("$path/$file", 0777);
                @unlink("$path/$file");
            }
        }

        return rmdir($path);
    }
}
