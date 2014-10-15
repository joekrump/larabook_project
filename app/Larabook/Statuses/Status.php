<?php
namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends \Eloquent {

    use EventGenerator, PresentableTrait;
    /**
     * @var array - fillable fields for a new Status.
     */
    protected $fillable = ['body'];

    /**
     * Path to the presenter for a Status.
     * @var string
     */
    protected $presenter = 'Larabook\Statuses\StatusPresenter';

    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }
    /**
     * Publish a new Status
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }
}