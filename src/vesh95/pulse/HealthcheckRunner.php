<?php

namespace vesh95\pulse;

class HealthcheckRunner implements HealthcheckRunnerInterface
{
    /**
     * @var \SplObjectStorage<CheckInterface>
     */
    private \SplObjectStorage $checks;

    public function __construct()
    {
        $this->checks = new \SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function append(CheckInterface $check): HealthcheckRunnerInterface
    {
        $this->checks->attach($check);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function run(): CheckResultsCollection
    {
        $result = new CheckResultsCollection();
        foreach ($this->checks as $check) {
            $result->add($check->check());
        }

        return $result;
    }
}