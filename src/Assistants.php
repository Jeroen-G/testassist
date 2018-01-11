<?php

namespace JeroenG\TestAssist;

trait Assistants
{
    use Browser\ClearCookiesBetweenTests,
        Console\OutputAssertions,
        Filesystem\FabricateModels,
        Filesystem\FileAssertions,
        Filesystem\ManageFilesystem;
}
