<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repositories\EventRepository;
use App\Transformers\EventTransformer;
use Jenssegers\Blade\Blade;

class EventController
{
    public function __construct(private EventRepository $eventRepository, private Blade $blade) {}

    public function index()
    {
        $events = $this->eventRepository->all();

        return $this->blade
            ->render('events.index', ['events' => $events]);
    }

    public function create()
    {
        return $this->blade
            ->render('events.create');
    }

    public function store()
    {
        if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['start_date']) || empty($_POST['end_date'])) {
            return $this->blade
                ->render('events.create', ['error' => 'All fields are required']);
        }

        $dto = EventTransformer::fromArray([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'startDate' => $_POST['start_date'],
            'endDate' => $_POST['end_date']
        ]);

        $this->eventRepository->create($dto);

        $events = $this->eventRepository->all();

        return $this->blade
            ->render('events.index', ['events' => $events]);
    }

    public function show(string $id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            return $this->blade
                ->render('common.404');
        }

        return $this->blade
            ->render('events.show', ['event' => $event]);
    }
}