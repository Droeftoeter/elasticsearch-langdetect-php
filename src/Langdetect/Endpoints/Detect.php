<?php
namespace Langdetect\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Detect
 *
 * @package Langdetect\Endpoints
 * @author Freek Post <freek@kobalt.blue>
 */
class Detect extends AbstractEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {
        return '/_langdetect';
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'profile'
        );
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = (string)$body;
        return $this;
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }

}