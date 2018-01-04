<?php

namespace JeroenG\TestAssist\Console;

trait OutputAssertions
{
    /**
     * Assert the expected text is in the console output.
     *
     * Found in spatie/laravel-backup
     *
     * @param string|array $expectedText
     * @return void
     */
    protected function seeInConsoleOutput($expectedText)
    {
        $consoleOutput = $this->app[Kernel::class]->output();
        $this->assertContains($expectedText, $consoleOutput, "Did not see `{$expectedText}` in console output: `$consoleOutput`");
    }

    /**
     * Assert the expected text is NOT in the console output.
     *
     * Found in spatie/laravel-backup
     *
     * @param string|array $unexpectedText
     * @return void
     */
    protected function doNotSeeInConsoleOutput($unexpectedText)
    {
        $consoleOutput = $this->app[Kernel::class]->output();
        $this->assertNotContains($unexpectedText, $consoleOutput, "Did not expect to see `{$unexpectedText}` in console output: `$consoleOutput`");
    }
}
