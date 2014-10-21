<?php namespace Anomaly\Streams\Addon\Tag\Messages;

use cebe\markdown\Markdown;
use Anomaly\Streams\Platform\Addon\Tag\TagAddon;

class MessagesTag extends TagAddon
{
    protected $slug = 'messages';

    /**
     * Create a new MessageTag instance.
     */
    public function __construct()
    {
        $this->parser = new Markdown();

        $this->messages = app()->make('streams.messages');
    }

    /**
     * Get messages of a certain type.
     *
     * @param null $type
     * @return array
     */
    public function get($type = null)
    {
        return array_map(
            function ($message) {

                $message = $this->parser->parse($message);

                return compact('message');
            },
            $this->messages->get($this->getAttribute('type', 0, $type))
        );
    }

    /**
     * Return success messages.
     *
     * @return mixed
     */
    public function success()
    {
        return $this->get(__FUNCTION__);
    }

    /**
     * Return info messages.
     *
     * @return mixed
     */
    public function info()
    {
        return $this->get(__FUNCTION__);
    }

    /**
     * Return warning messages.
     *
     * @return mixed
     */
    public function warning()
    {
        return $this->get(__FUNCTION__);
    }

    /**
     * Return error messages.
     *
     * @return mixed
     */
    public function error()
    {
        return $this->get(__FUNCTION__);
    }
}
