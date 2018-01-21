<?php

namespace JeroenG\TestAssist\Database;

use Illuminate\Database\Eloquent\Model;

trait DataAssertions
{
    /**
     * Alias for asserting that a model is inserted in the database.
     *
     * @param string $table
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function assertCreated(string $table, Model $model)
    {
        $this->assertDatabaseHas($table, ['created_at' => $model->created_at]);
    }

    /**
     * Alias for asserting that a model's row is updated.
     *
     * @param string $table
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function assertUpdated(string $table, Model $model)
    {
        $this->assertNotEquals($model->created_at, $model->updated_at);
        $this->assertDatabaseHas($table, ['updated_at' => $model->updated_at]);
    }
}
