<?php


/**
 * Check results collection
 */
class CheckResultsCollection implements JsonSerializable, IteratorAggregate, Countable
{
    /**
     * @var SplObjectStorage<CheckResult>
     */
    private SplObjectStorage $results;

    /**
     * CheckResultsCollection constructor.
     */
    public function __construct()
    {
        $this->results = new SplObjectStorage();
    }

    /**
     * Append a check result to the collection
     * @param CheckResult $result
     * @return void
     */
    public function add(CheckResult $result): void
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
    public function getIterator(): Generator
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