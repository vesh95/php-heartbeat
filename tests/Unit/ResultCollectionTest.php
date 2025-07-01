<?php

use PHPUnit\Framework\TestCase;
use Vesh95\Heartbeat\Result;
use Vesh95\Heartbeat\ResultsCollection;

class ResultCollectionTest extends TestCase
{
    public function testAdd(): void
    {
        $result = new Result('test', true, null);

        $collection = new ResultsCollection();
        $collection->add($result);
        $this->assertCount(1, $collection);
    }

    public function testAddRepeat(): void
    {
        $result = new Result('test', true, null);

        $collection = new ResultsCollection();
        $collection->add($result);
        $collection->add($result);
        $this->assertCount(1, $collection);
    }

    public function testAddMultiple(): void
    {
        $result1 = new Result('test1', true, null);
        $result2 = new Result('test2', true, null);

        $collection = new ResultsCollection();
        $collection->add($result1);
        $collection->add($result2);
        $this->assertCount(2, $collection);
    }
}