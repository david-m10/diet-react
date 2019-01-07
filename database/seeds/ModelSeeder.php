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
     * Are timestamps random.
     *
     * @var bool
     */
    private $areRandomTimestamps;

    /**
     * ModelSeeder constructor.
     *
     * @param string $class
     * @param array|null $data
     * @param bool $areRandomTimestamps
     */
    public function __construct(string $class, ?array $data, $areRandomTimestamps = false)
    {
        /** @var \Illuminate\Database\Eloquent\Model $model */
        $model = new $class;
        $this->table = $model->getTable();

        $this->data = $data;
        $this->areRandomTimestamps = $areRandomTimestamps;

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
            $this->insertRecord($item);
        }
    }

    /**
     * @param $data
     */
    private function insertRecord(array $data)
    {
        $timestamps = $this->areRandomTimestamps
            ? $this->getRandomTimestamps()
            : $this->timestamps;

        DB
            ::table($this->table)
            ->insert(array_merge($timestamps, $data));
    }

    /**
     * @return int
     */
    private function getRandomInt(): int
    {
        return random_int(1, 99);
    }

    /**
     * @return \Carbon\Carbon
     */
    private function getRandomDate(): \Carbon\Carbon
    {
        return now()
            ->subDays($this->getRandomInt())
            ->subHours($this->getRandomInt())
            ->subMinutes($this->getRandomInt());
    }

    /**
     * @return array
     */
    private function getRandomTimestamps(): array
    {
        $timestamp = $this->getRandomDate();

        return [
            'created_at' => $timestamp,
            'updated_at' => $timestamp,

        ];
    }
}