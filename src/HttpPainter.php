<?php

namespace Qrcode;

use GuzzleHttp\Client;
use Qrcode\Contracts\Painter;
use Qrcode\Exceptions\QrCodeGeneratorException;

class HttpPainter implements Painter
{
    private Client $client;

    public function __construct($config = [])
    {
        $this->client = new Client($config);
    }

    /**
     * @throws QrCodeGeneratorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function draw(array $params): string
    {
        try {
            $response = $this->client->get('/', $params);

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            throw new QrCodeGeneratorException($e->getMessage(), $e->getCode());
        }
    }
}
