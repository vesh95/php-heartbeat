<?php

namespace Vesh95\Heartbeat;

/**
 * Check results collection
 */
class ResultsCollection implements \JsonSerializable, \IteratorAggregate, \Countable
{
    /**
     * @var \SplObjectStorage<Result>
     */
    private \SplObjectStorage $results;

    /**
     * CheckResultsCollection constructor.
     */
    public function __construct()
    {
        $this->results = new \SplObjectStorage();
    }

    /**
     * Append a check result to the collection
     * @param Result $result
     * @return void
     */
    public function add(Result $result): void
    {
        $this->results->attach($result);
    }

    public function allOk(): bool
    {
        $ok = true;
        foreach ($this->results as $result) {
            if (!$result->result) {
                $ok = false;
                break;
            }
        }
        return $ok;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        $results = [];
        foreach ($this->results as $result) {
            $results[] = [
                'name'   => $result->name,
                'status' => $result->result,
                'error'  => $result->error,
            ];
        }

        return $results;
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): \Generator
    {
        yield from $this->results;
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return $this->results->count();
    }
}