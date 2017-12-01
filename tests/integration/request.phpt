--TEST--
Test request
--FILE--
<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use WilliamEspindola\AbstractHTTPClient\AbstractRequest;
use WilliamEspindola\AbstractHTTPClient\GuzzleClient;

final class MyRequest extends AbstractRequest
{
    protected $endPoint = '/v0/item/:id.json';

    public function request(int $id): Response
    {
        $this->setParameters([':id' => $id]);

        return $this->client->request('GET', $this->getURI());
    }
}

$instance = new MyRequest(new GuzzleClient(new Client), 'https://hacker-news.firebaseio.com');

$response = $instance->request(8863);

var_dump($response->getStatusCode());
var_dump(json_decode($response->getBody()->getContents())->id);
?>
--EXPECTF--
int(200)
int(8863)
