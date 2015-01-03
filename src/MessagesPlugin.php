<?php namespace Anomaly\MessagesPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use cebe\markdown\Markdown;
use cebe\markdown\Parser;

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
     * The parser object.
     *
     * @var \cebe\markdown\Markdown|\cebe\markdown\Parser
     */
    protected $parser;

    /**
     * Create a new MessagesPlugin instance.
     *
     * @param Parser $parser
     */
    function __construct(Markdown $parser)
    {
        $this->parser = $parser;
    }

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
