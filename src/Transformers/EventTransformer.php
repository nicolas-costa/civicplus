<?php

declare(strict_types=1);

namespace App\Transformers;

use App\DTOs\EventDTO;

class EventTransformer
{
    public static function fromArray(array $data): EventDTO
    {
        return new EventDTO(
            $data['id'] ?? null,
            $data['title'] ?? '',
            $data['description'] ?? '',
            $data['startDate'] ?? '',
            $data['endDate'] ?? '',
        );
    }

    public static function toArray(EventDTO $dto): array
    {
        return [
            'id' => $dto->getId(),
            'title' => $dto->getTitle(),
            'description' => $dto->getDescription(),
            'startDate' => $dto->getStartDate(),
            'endDate' => $dto->getEndDate()
        ];
    }
}