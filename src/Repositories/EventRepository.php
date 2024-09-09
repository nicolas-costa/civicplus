<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTOs\EventDTO;
use App\Services\CivicPlusAPI;
use App\Transformers\EventTransformer;

class EventRepository
{
    private string $resourceUrl = 'api/Events';
    public function __construct(private CivicPlusAPI $api)
    {}

    public function all(int $perPage = 10, int $page = 1, array $filter = [], string $orderBy = 'start_date') : array
    {
        $events = $this->api->get($this->resourceUrl, [
            'top' => $perPage,
            'skip' => ($page - 1) * $perPage,
            'filter'  => $filter,
            'order_by' => $orderBy,
        ]);

        return array_map(function($event) {
            return EventTransformer::fromArray($event);
        }, $events['items']);
    }

    public function create(EventDTO $data) : EventDTO
    {
        $response = $this->api->post($this->resourceUrl, EventTransformer::toArray($data));

        return EventTransformer::fromArray($response);
    }

    public function find(string $id): ?EventDTO
    {
        $event = $this->api->get($this->resourceUrl . '/' .$id);

        if (empty($event)) {
            return null;
        }

        return EventTransformer::fromArray($event);
    }
}