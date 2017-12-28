<?php

/**
 *
 */
trait FabricateModels
{
     /*
    found in laracasts/lets-build-a-forum-in-laravel
    */
    function create($class, $attributes = [], $times = null)
    {
        return factory($class, $times)->create($attributes);
    }

/*
    found in laracasts/lets-build-a-forum-in-laravel
    */
function make($class, $attributes = [], $times = null)
    {
        return factory($class, $times)->make($attributes);
    }
}
