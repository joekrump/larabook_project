<?php

namespace Larabook\Statuses;


use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class PublishStatusCommandHandler implements CommandHandler
{

    use DispatchableTrait;
    /**
     * @var StatusRepository - status repository
     */
    protected $statusRepository;

    /**
     * @param StatusRepository $statusRepository
     */
    function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function handle($command)
    {
        $status = Status::publish($command->body);

        $this->statusRepository->save($status, $command->userId);

        $this->dispatchEventsFor($status);

        return $status;
    }
} 