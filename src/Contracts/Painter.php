<?php

namespace Qrcode\Contracts;

interface Painter
{
    public function draw(array $params): string;
}
