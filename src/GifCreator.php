<?php

Class GifCreator
{
    public function createFirstFrame(string $imageData, int $delay = 0) :string
    {
        return $this->getHeader($imageData) . $this->createFrame($imageData, $delay);
    }

    public function createFrame(string $imageData, int $delay = 0): string
    {

        $startPos = 13 + 3 * (2 << (ord($imageData[10]) & 0x07));
        $endPos = strlen($imageData) - $startPos - 1;

        $imageDescriptor = substr($imageData, $startPos, $endPos);

        $graphicControl = "!\xF9\x04\x00" . chr(($delay >> 0) & 0xFF) . chr(($delay >> 8) & 0xFF) . "\x00\x00";

        return $graphicControl .  $imageDescriptor;
    }


    private function getHeader(string $imageData): string
    {
        $cmap = 3 * (2 << (ord($imageData[10]) & 0x07));
        $result = 'GIF89a';
        $result .= substr($imageData, 6, 7);
        $result .= substr($imageData, 13, $cmap);
        $result .= "!\xFF\x0BNETSCAPE2.0\x03\x01\xFF\xFF\x00";

        return $result;
    }
}
