<?php

namespace App\Contracts;

use XMLWriter;

class YRLGenerator
{
    /**
     * Устанавливаем кодировку для YRL файла
     * Технические требования обязывают нас устанавливать именно UTF-8
     */
    protected $encoding = 'urf-8';

    /**
     * Путь к итоговому файлу.
     * Может совпадать с временным файлом, если не нужна горячая замена
     */
    protected $outputFile;

    /**
     * Временный файл
     */
    protected $tmpFile;

    /**
     * Устанавливает, какое максимальное количество офферов
     * до flush-а содержит в памяти наш класс.
     */
    protected $maxBufferLength;

    protected $currentCount = 0;

    /**
     * Пишущий движок
     * @var XMLWriter
     */
    protected $engine;

    public function __construct(string $outputFile, ?string $tmpFile = null, int $bufferLength = 1000)
    {
        $this->engine = new XMLWriter();
        $this->outputFile = $outputFile;
        $this->tmpFile = $tmpFile ?? $outputFile;
        $this->maxBufferLength = $bufferLength;
    }

    public function beforeWrite()
    {
        $this->engine->openMemory();
        $this->engine->startDocument('1.0', $this->encoding);
        $this->engine->startElement('realty-feed');
        $this->engine->writeAttribute('xmlns', 'http://webmaster.yandex.ru/schemas/feed/realty/2010-06');
        $this->engine->writeElement('generation-date', date(DATE_ATOM));
    }

    public function bulkWrite(AbstractOffer $offer)
    {
        $this->engine->writeRaw($offer->toXMLString());
        $this->flushIfNeeds();
    }

    public function afterWrite()
    {
        $this->engine->fullEndElement();
        $this->engine->endDocument();
        $this->flushToFile();
        $this->renameTemporaryFile();
    }

    protected function flushToFile()
    {
        file_put_contents($this->tmpFile, $this->engine->flush(true), FILE_APPEND);
    }

    protected function renameTemporaryFile()
    {
        if ($this->tmpFile !== $this->outputFile) {
            rename($this->tmpFile, $this->outputFile);
        }
    }

    protected function flushIfNeeds()
    {
        if (0 === $this->currentCount % $this->maxBufferLength) {
            $this->flushToFile();
        }
        $this->currentCount++;
    }
}
