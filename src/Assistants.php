<?php

namespace JeroenG\TestAssist;

trait Assistants
{
    use Browser\ClearCookiesBetweenTests,
        Console\OutputAssertions,
        Database\FabricateModels,
        Database\DataAssertions,
        Filesystem\FileAssertions,
        Filesystem\ManageFilesystem;

    /**
     * Set up database seeding, run if the dedicated assistant is used.
     */
    public function SetUpSeeder()
    {
        // If Concerns\SeedDatabase is used, go seed the database, but only once per class.
        if (isset(static::$seedDatabase) && static::$seedDatabase != false) {
            $this->seedDatabase();
            static::$seedDatabase = false;
        }
    }
}
