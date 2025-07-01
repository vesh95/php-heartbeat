<?php

use PHPUnit\Framework\TestCase;
use Vesh95\Heartbeat\CheckInterface;
use Vesh95\Heartbeat\DefaultHealthcheckRunner;
use Vesh95\Heartbeat\HealthcheckRunnerInterface;
use Vesh95\Heartbeat\Result;

class HealthcheckRunnerTest extends TestCase
{
    private int $checksCounter = 1;
    private readonly HealthcheckRunnerInterface $healthcheckRunner;

    protected function setUp(): void
    {
        $this->checksCounter = 1;
        $this->healthcheckRunner = new DefaultHealthcheckRunner();
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testOnceSuccess(): void
    {
        $runner = $this->healthcheckRunner;
        $runner->append($this->makeCheck(true));

        $result = $runner->run();
        $this->assertTrue($result->allOk());
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testWithOnceFail(): void
    {
        $runner = $this->healthcheckRunner;
        $runner->append($this->makeCheck(false));

        $result = $runner->run();
        $this->assertFalse($result->allOk());
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testWithManySuccess(): void
    {
        $runner = $this->healthcheckRunner;
        $runner->append($this->makeCheck(true));
        $runner->append($this->makeCheck(true));

        $result = $runner->run();
        $this->assertTrue($result->allOk());
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testWithManyFailed(): void
    {
        $runner = $this->healthcheckRunner;
        $runner->append($this->makeCheck(false));
        $runner->append($this->makeCheck(false));

        $result = $runner->run();
        $this->assertFalse($result->allOk());
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testWithManySuccessAndFailed(): void
    {
        $runner = $this->healthcheckRunner;
        $runner->append($this->makeCheck(true));
        $runner->append($this->makeCheck(false));
        $runner->append($this->makeCheck(true));

        $result = $runner->run();
        $this->assertFalse($result->allOk());
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    private function makeCheck(bool $ok): CheckInterface
    {
        $check = $this->createStub(CheckInterface::class);
        $check->method('check')->willReturn(new Result('test_' . $this->checksCounter, $ok, null));

        return $check;
    }
}