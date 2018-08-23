<?php

namespace JeroenG\TestAssist\Database;

use Illuminate\Support\Facades\DB;

trait SQLiteRegex
{
    /**
     * MySQL has a REGEXP/RLIKE function, SQLite only partly, it needs it defined before use.
     *
     * Found as a Gist here: https://gist.github.com/wingsline/4441139
     */
    public function AddRegexToSQLite()
    {
        if (DB::Connection() instanceof \Illuminate\Database\SQLiteConnection) {
            DB::connection()->getPdo()->sqliteCreateFunction('REGEXP', function ($pattern, $value) {
                mb_regex_encoding('UTF-8');

                return (false !== mb_ereg($pattern, $value)) ? 1 : 0;
            });
        }
    }
}
