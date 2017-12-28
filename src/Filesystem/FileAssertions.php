<?php

/**
 * x
 */
// https://github.com/spatie/laravel-backup/blob/master/tests/TestHelper.php
trait FileAssertions
{
    /*
    found in spatie/laravel-backup
    */
    public function assertFileExistsOnDisk(string $fileName, string $diskName)
    {
        $this->assertTrue($this->fileExistsOnDisk($fileName, $diskName), "Failed asserting that `{$fileName}` exists on disk `{$diskName}`");
    }
    /*
    found in spatie/laravel-backup
    */
    public function assertFileNotExistsOnDisk(string $fileName, string $diskName)
    {
        $this->assertFalse($this->fileExistsOnDisk($fileName, $diskName), "Failed asserting that `{$fileName}` does not exist on disk `{$diskName}`");
    }
    /*
    found in spatie/laravel-backup
    */
    public function fileExistsOnDisk(string $fileName, string $diskName): bool
    {
        try {
            Storage::disk($diskName)->getMetaData($fileName);
            return true;
        } catch (FileNotFoundException $exception) {
            return false;
        }
    }
    /*
    found in spatie/laravel-backup
    */
    public function assertTempFilesExist(array $files)
    {
        foreach ($files as $file) {
            $path = $this->testHelper->getTempDirectory().'/'.$file;
            $this->assertFileExists($path);
        }
    }
    /*
    found in spatie/laravel-backup
    */
    public function assertTempFilesNotExist(array $files)
    {
        foreach ($files as $file) {
            $path = $this->testHelper->getTempDirectory().'/'.$file;
            $this->assertFileNotExists($path);
        }
    }
        /*
        Found in spatie/laravel-backup
        */
        protected function assertPathNotExists($path)
    {
        $this->assertFalse($this->pathExists($path), "Failed to assert that the directory `{$path}` does not exist");
    }
    /*
    Found in spatie/laravel-backup
    */
    protected function pathExists($path): bool
    {
        return is_dir($path) && file_exists($path);
    }
    /*
    Found in spatie/laravel-backup
    */
    protected function assertFileExistsInZip($zipPath, $filename)
    {
        $this->assertTrue($this->fileExistsInZip($zipPath, $filename), "Failed to assert that {$zipPath} contains a file name {$filename}");
    }
    /*
    Found in spatie/laravel-backup
    */
    protected function assertFileDoesntExistsInZip($zipPath, $filename)
    {
        $this->assertFalse($this->fileExistsInZip($zipPath, $filename), "Failed to assert that {$zipPath} doesn't contain a file name {$filename}");
    }
    /*
    Found in spatie/laravel-backup
    */
    protected function fileExistsInZip($zipPath, $filename)
    {
        $zip = new \ZipArchive();
        if ($zip->open($zipPath) === true) {
            return $zip->locateName($filename, \ZipArchive::FL_NODIR) !== false;
        }
        return false;
    }

}
