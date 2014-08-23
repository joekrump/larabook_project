<?php
namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;

class Status extends \Eloquent {

    use EventGenerator;
    /**
     * @var array - fillable fields for a new Status.
     */
    protected $fillable = ['body'];

    public function user()
    {
        $this->belongsTo('Larabook\Users\User');
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