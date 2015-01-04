<?php namespace Anomaly\MessagesPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class MessagesPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Plugin\Messages
 */
class MessagesPlugin extends Plugin
{

    /**
     * Return the messages of a provided type.
     *
     * @param null $type
     * @return array
     */
    public function get($type = null)
    {
        return array_map(
            function ($message) {

                $message = $this->parser->parse(trans($message));

                return compact('message');
            },
            app('session')->get($this->attributes->getValue('type', $type), [])
        );
    }

    /**
     * Return success messages.
     *
     * @return array
     */
    public function success()
    {
        return $this->get(__FUNCTION__);
    }

    /**
     * Return info messages.
     *
     * @return array
     */
    public function info()
    {
        return $this->get(__FUNCTION__);
    }

    /**
     * Return warning messages.
     *
     * @return array
     */
    public function warning()
    {
        return $this->get(__FUNCTION__);
    }

    /**
     * Return error messages.
     *
     * @return array
     */
    public function error()
    {
        return $this->get(__FUNCTION__);
    }
}
