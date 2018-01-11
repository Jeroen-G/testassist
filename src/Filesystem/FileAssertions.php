<?php

namespace JeroenG\TestAssist\Filesystem;

use Storage;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

trait FileAssertions
{
    /**
     * Assert that a file exists on a given storage disk.
     *
     * found in spatie/laravel-backup.
     *
     * @param string $fileName
     * @param string $diskName
     * @return void
     */
    public function assertFileExistsOnDisk(string $fileName, string $diskName = 'local')
    {
        $this->assertTrue($this->fileExistsOnDisk($fileName, $diskName), "Failed asserting that `{$fileName}` exists on disk `{$diskName}`");
    }

    /**
     * Assert that a file does NOT exist on a given storage disk.
     *
     * found in spatie/laravel-backup.
     *
     * @param string $fileName
     * @param string $diskName
     * @return void
     */
    public function assertFileNotExistsOnDisk(string $fileName, string $diskName)
    {
        $this->assertFalse($this->fileExistsOnDisk($fileName, $diskName), "Failed asserting that `{$fileName}` does not exist on disk `{$diskName}`");
    }

    /**
     * Assert that a file is present in a .zip file.
     *
     * found in spatie/laravel-backup.
     *
     * @param string $zipPath
     * @param string $filename
     * @return bool
     */
    public function assertFileExistsInZip(string $zipPath, string $filename)
    {
        $this->assertTrue($this->fileExistsInZip($zipPath, $filename), "Failed to assert that {$zipPath} contains a file name {$filename}");
    }

    /**
     * Assert that a file is NOT present in a .zip file.
     *
     * found in spatie/laravel-backup.
     *
     * @param string $zipPath
     * @param string $filename
     * @return bool
     */
    public function assertFileDoesntExistsInZip(string $zipPath, string $filename)
    {
        $this->assertFalse($this->fileExistsInZip($zipPath, $filename), "Failed to assert that {$zipPath} doesn't contain a file name {$filename}");
    }

    /**
     * Underlying function for the assertions to check for a file on a disk.
     *
     * found in spatie/laravel-backup.
     *
     * @param string $fileName
     * @param string $diskName
     * @return bool
     */
    protected function fileExistsOnDisk(string $fileName, string $diskName)
    {
        try {
            Storage::disk($diskName)->getMetaData($fileName);

            return true;
        } catch (FileNotFoundException $exception) {
            return false;
        }
    }

    /**
     * Underlying function to check if a path (dir/file) exists.
     *
     * Found in spatie/laravel-backup
     *
     * @param string $path
     * @return bool
     */
    protected function pathExists(string $path)
    {
        return is_dir($path) && file_exists($path);
    }

    /**
     * Underlying function to check if a file exists in a .zip file.
     *
     * Found in spatie/laravel-backup
     *
     * @param string $zipPath
     * @param string $filename
     * @return bool
     */
    protected function fileExistsInZip(string $zipPath, string $filename)
    {
        $zip = new \ZipArchive();
        if ($zip->open($zipPath) === true) {
            return $zip->locateName($filename, \ZipArchive::FL_NODIR) !== false;
        }

        return false;
    }
}
