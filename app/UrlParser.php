<?php

namespace App;

class UrlParser
{
    /** @var /Illuminate/Support/Collection $data */
    private $data;

    /**
     * UrlParser constructor.
     * @param string|null $parserData
     */
    public function __construct(string $parserData = '')
    {
        $this->data =
            collect(explode('/', $parserData))
                ->map(function (string $item) {
                    $pair = explode('=', $item);

                    if (!isset($pair[0]) || !isset($pair[1])) {
                        return null;
                    }

                    return [
                        'name' => $pair[0],
                        'value' => $pair[1],
                    ];
                    // Todo explode pair by commas,
                    // implode many parameters with the same name,
                    // get array elements (laravel shpould help)
                })
                ->filter(function ($element) {
                    return $element !== null;
                });
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getFirstValue(string $name)
    {
        return $this->data->where('name', $name)->first()['value'] ?? null;
    }
}
