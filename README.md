Elasticsearch Langdetect PHP Namespace
---

This module adds endpoints to the [Elasticsearch-PHP](https://github.com/elastic/elasticsearch-php) library when you are using the [elasticsearch-langdetect](https://github.com/jprante/elasticsearch-langdetect) plugin.

Installation
---

This module can be installed with [Composer](https://getcomposer.org/).
Add the elasticsearch-langdetect-php package to your ```composer.json``` file:

```json
{
    "require": {
        "sjaakmoes/elasticsearch-langdetect-php": "~1.0"
    }
}
```

After the module is installed through composer, we need to inject this module into the [Elasticsearch-PHP](https://github.com/elastic/elasticsearch-php) library:

```php
$params = [
    'host'              => ['localhost:9200'],
    'customNamespaces'  => [
        'langdetect'    => 'Langdetect\LangdetectNamespace'
    ]
];
$client = new Elasticsearch\Client($params);
```

Use
---

Language detection:
```php
// Detect
$params = [
    'content'   => 'This is a sample text.'
];
$response = $client->langdetect()->detect($params);
```

The ```$response``` holds an array which looks like:

```
Array
(
    [profile] => /langdetect/
    [languages] => Array
        (
            [0] => Array
                (
                    [language] => en
                    [probability] => 0.9999959428847
                )

        )

)
```