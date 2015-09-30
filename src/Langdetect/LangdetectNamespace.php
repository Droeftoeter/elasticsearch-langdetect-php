<?php
namespace Langdetect;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class LangdetectNamespace
 *
 * @package Langdetect
 * @author Freek Post <freek@kobalt.blue>
 */
class LangdetectNamespace extends AbstractNamespace
{

    /**
     * @return callable
     */
    public static function build() {
        return function ($dicParams) {
            return new LangdetectNamespace($dicParams['transport'], $dicParams['endpoint']);
        };
    }

    /**
     * $params  ['content'] = (string) Content to detect the language for (Required)
     *          ['profile'] = (string) Detection profile to use.
     *
     * @param $params array
     *
     * @return array
     */
    public function detect($params)
    {
        $body = $this->extractArgument($params, 'content');

        $endpoint = new Endpoints\Detect($this->transport);
        $endpoint->setBody($body);
        $endpoint->setParams($params);

        $response = $endpoint->performRequest();
        return $response['data'];
    }

}