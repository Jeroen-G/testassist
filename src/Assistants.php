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
}
