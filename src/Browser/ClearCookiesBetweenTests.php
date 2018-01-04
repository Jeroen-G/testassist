<?php

namespace JeroenG\TestAssist\Browser;

use Illuminate\Support\Collection;

// Based on the work by inxilpro for https://github.com/laravel/dusk/pull/285
trait ClearCookiesBetweenTests
{
    /**
     * Optionally clear all cookies after a test has run.
     *
     * @return void
     */
    protected function clearCookies()
    {
        if ($this->clearCookies == true) {
            Collection::make(static::$browsers)->each(function ($b) {
                $b->driver->manage()->deleteAllCookies();
            });
        }
    }
}
