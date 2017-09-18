<?php

class TimeGif
{
    /** @var GifCreator  */
    private $gifCreator;

    public function __construct(GifCreator $gifCreator)
    {
        $this->gifCreator = $gifCreator;
    }

    public function run(string $format = 'H:i:s'): void
    {
        $delay = round(100 * $this->getReamingSecTillNextSecond());
        $this->setHttpHeaders();

        echo $this->gifCreator->createFirstFrame($this->createImage(date($format)), $delay);

        foreach ($this->getCurrentTime($format) as $timeString) {
            echo $this->gifCreator->createFrame($this->createImage($timeString), 100);

            ob_flush();
            flush();
            sleep(1);
        }
    }

    private function setHttpHeaders(): void
    {
        header ('Content-type:image/gif');
        header ('Content-Transfer-Encoding: binary');
        header ('Cache-Control: no-cache');
        header ('Cache-Control: no-store');
        header ('Cache-Control: no-transform');
    }

    private function createImage(string $message):string {
        $image = imagecreatetruecolor(72, 18);
        $text_color = imagecolorallocate($image, 255, 255, 255);
        imagestring($image, 5, 0, 0, $message, $text_color);


        ob_start();
        imagegif($image);
        $result = ob_get_contents();
        ob_end_clean();

        return $result;
    }

    private function getReamingSecTillNextSecond():float
    {
        return 1 - fmod(microtime(true), 1);
    }

    private function getCurrentTime(string $format): \Generator
    {
        while (true) {
            yield date($format);
        }
    }
}
