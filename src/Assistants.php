<?php

namespace JeroenG\TestAssist;

trait Assistants {
    use JeroenG\TestAssist\Browser\ClearCookiesBetweenTests,
        JeroenG\TestAssist\Console\OutputAssertions,
        JeroenG\TestAssist\Filesystem\FabricateModels,
        JeroenG\TestAssist\Filesystem\FileAssertions,
        JeroenG\TestAssist\Filesystem\ManageFilesystem;
}