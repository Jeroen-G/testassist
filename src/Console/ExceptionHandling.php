<?php

namespace JeroenG\TestAssist\Console;

trait ExceptionHandling
{
    /**
     * Disable exception handling, so error messages are not suppressed by Laravel's error rendering.
     *
     * found on https://adamwathan.me/2016/01/21/disabling-exception-handling-in-acceptance-tests/
     */
    protected function disableExceptionHandling(): void
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
        $this->app->instance(ExceptionHandler::class, new class() extends Handler {
            public function __construct()
            {
            }

            public function report(\Exception $e)
            {
            }

            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }

    /**
     * Use when you disabled exception handling, but later on decide you want to reactive it.
     *
     * found on https://gist.github.com/adamwathan/125847c7e3f16b88fa33a9f8b42333da
     */
    protected function withExceptionHandling(): self
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }
}
