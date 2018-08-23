<?php

namespace JeroenG\TestAssist\Database;

trait SeedDatabase
{
    /**
     * Determine whether the seeder should run. Set to false after it ran.
     *
     * @var bool
     */
    public static $seedDatabase = true;

    /**
     * Seed the database with testdata.
     */
    public function seedDatabase()
    {
        $this->seed('DatabaseSeeder');
    }
}
