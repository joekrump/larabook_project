<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function accountAge()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Present the link to the user's gravatar
     * @param int $size - The pixel dimension for the gravatar image.
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }
}