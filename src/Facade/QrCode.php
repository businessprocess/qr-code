<?php

namespace Qrcode\Facade;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\HtmlString;

/**
 * @method static string|HtmlString generate(string $content)
 * @method static static rendererDeflateLevel($rendererDeflateLevel)
 * @method static static rendererDeflateStrategy($rendererDeflateStrategy)
 * @method static static type($type)
 * @method static static margin($margin)
 * @method static static scale($scale)
 * @method static static width($width)
 * @method static static colorDark($colorDark)
 * @method static static colorLight($colorLight)
 * @method static static version($version)
 */
class QrCode extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'qrcode';
    }
}
