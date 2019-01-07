<?php

class ModelSeeder
{
    /**
     * Model's table.
     *
     * @var  string
     */
    private $table;

    /**
     * Data to seed.
     *
     * @var array|null
     */
    private $data;

    /**
     * Default timestamps.
     *
     * @var array
     */
    private $timestamps;

    /**
     * ModelSeeder constructor.
     *
     * @param string $class
     * @param array|null $data
     */
    public function __construct(string $class, ?array $data)
    {
        /** @var \Illuminate\Database\Eloquent\Model $model */
        $model = new $class;
        $this->table = $model->getTable();

        $this->data = $data;

        $now = now();
        $this->timestamps = [
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }

    /**
     * Seed data.
     */
    public function run()
    {
        foreach ($this->data as $item) {
            DB
                ::table($this->table)
                ->insert(array_merge($this->timestamps, $item));
        }
    }
}