<?php

namespace Qrcode;

use InvalidArgumentException;
use Qrcode\Contracts\Painter;

class Generator
{
    /**
     * @defaul false
     */
    private bool $d = false;

    /**
     * @defaul svg
     */
    private string $type = 'svg';

    /**
     * @var numeric
     *
     * @defaul 9
     *
     * @description  Compression level for deflate.
     */
    private $rendererDeflateLevel;

    /**
     * @var numeric
     *
     * @defaul 3
     *
     * @description Compression strategy for deflate.
     */
    private $rendererDeflateStrategy;

    /**
     * @var numeric
     *
     * @defaul 4
     */
    private $margin;

    /**
     * @var numeric
     *
     * @defaul 4
     */
    private $scale;

    /**
     * @var numeric
     */
    private $width;

    /**
     * @var numeric
     *
     * @defaul '#000000ff'
     *
     * @description Color of dark module.
     */
    private $colorDark;

    /**
     * @var string
     *
     * @defaul '#ffffffff'
     *
     * @description Color of light module.
     */
    private $colorLight;

    /**
     * @var numeric
     *
     * @description QR Code version. If not specified the more suitable value will be calculated.
     */
    private $version;

    public function __construct(private Painter $painter)
    {
    }

    public function getPainter(): Painter
    {
        return $this->painter;
    }

    public function generate(string $content)
    {
        if (strlen($content) === 0) {
            throw new \InvalidArgumentException('Found empty contents');
        }

        $qrCode = $this->getPainter()->draw($this->getAttributes());

        if (class_exists(\Illuminate\Support\HtmlString::class)) {
            return new \Illuminate\Support\HtmlString($qrCode);
        }

        return $qrCode;
    }

    protected function getAttributes(): array
    {
        return [
            'd' => $this->d,
            'type' => $this->type,
            'rendererDeflateLevel' => $this->rendererDeflateLevel,
            'rendererDeflateStrategy' => $this->rendererDeflateStrategy,
            'margin' => $this->margin,
            'scale' => $this->scale,
            'width' => $this->width,
            'colorDark' => $this->colorDark,
            'colorLight' => $this->colorLight,
            'version' => $this->version,
        ];
    }

    public function rendererDeflateLevel($rendererDeflateLevel): static
    {
        $this->rendererDeflateLevel = $rendererDeflateLevel;

        return $this;
    }

    public function rendererDeflateStrategy($rendererDeflateStrategy): static
    {
        $this->rendererDeflateStrategy = $rendererDeflateStrategy;

        return $this;
    }

    public function type(string $type): static
    {
        if (! in_array($type, ['svg', 'png'])) {
            throw new InvalidArgumentException("Type must be svg or png. {$type} is not a valid.");
        }

        $this->type = $type;

        return $this;
    }

    public function margin($margin): static
    {
        $this->margin = $margin;

        return $this;
    }

    public function scale($scale): static
    {
        $this->scale = $scale;

        return $this;
    }

    public function width($width): static
    {
        $this->width = $width;

        return $this;
    }

    public function colorDark(string $colorDark): static
    {
        $this->colorDark = $colorDark;

        return $this;
    }

    public function colorLight(string $colorLight): static
    {
        $this->colorLight = $colorLight;

        return $this;
    }

    public function version($version): static
    {
        $this->version = $version;

        return $this;
    }
}
