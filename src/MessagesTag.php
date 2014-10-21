<?php namespace Anomaly\Streams\Tag\Messages;

use cebe\markdown\Markdown;
use Streams\Core\Addon\TagAbstract;

class MessagesTag extends TagAbstract
{
    /**
     * Create a new MessageTag instance.
     */
    public function __construct()
    {
        $this->messages = \App::make('messages');

        $this->parser = new Markdown();
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

                // Markdown makes stuff like <strong>This</strong> much easier.
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
