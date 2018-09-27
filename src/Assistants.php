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

    /**
     * Assert that a given class is called by the Laravel application when executing the callback.
     *
     * @param string   $className
     * @param callable $callback
     *
     * @return bool|string
     */
    public function assertIsCalled($className, $callback)
    {
        $called = false;
        $this->app->resolving(function ($object, $app) use (&$called, $className) {
            if ($object instanceof $className) {
                $called = true;
            }
        });

        call_user_func($callback);

        $this->assertTrue($called, $className.' was not called.');
    }
}
