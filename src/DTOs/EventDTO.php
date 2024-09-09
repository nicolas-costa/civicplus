<?php

namespace App\DTOs;

class EventDTO
{
    protected ?string $id = null;
    protected string $title = '';
    protected string $description = '';
    protected string $startDate = '';
    protected string $endDate = '';

    public function __construct(?string $id, string $title, string $description, string $startDate, string $endDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    protected function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }
}