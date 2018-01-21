<?php

namespace JeroenG\TestAssist\Database;

trait FabricateModels
{
    /**
     * Shortcut to 'create' models through factories.
     *
     * Found in Laracasts/lets-build-a-forum-in-laravel
     *
     * @param string $class
     * @param array $attributes
     * @param int|null $times
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(string $class, array $attributes = [], $times = null)
    {
        return factory($class, $times)->create($attributes);
    }

    /**
     * Shortcut to 'make' models through factories.
     *
     * Found in Laracasts/lets-build-a-forum-in-laravel
     *
     * @param string $class
     * @param array $attributes
     * @param int|null $times
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function make(string $class, array $attributes = [], $times = null)
    {
        return factory($class, $times)->make($attributes);
    }
}
