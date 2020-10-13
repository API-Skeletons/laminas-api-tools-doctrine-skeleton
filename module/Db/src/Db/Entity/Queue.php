<?php

namespace Db\Entity;

/**
 * Queue
 */
class Queue
{
    /**
     * @var string
     */
    private $queue;

    /**
     * @var string
     */
    private $data;

    /**
     * @var int
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $scheduled;

    /**
     * @var \DateTime|null
     */
    private $executed;

    /**
     * @var \DateTime|null
     */
    private $finished;

    /**
     * @var int|null
     */
    private $priority;

    /**
     * @var string|null
     */
    private $message;

    /**
     * @var string|null
     */
    private $trace;

    /**
     * @var int
     */
    private $id;


    /**
     * Set queue.
     *
     * @param string $queue
     *
     * @return Queue
     */
    public function setQueue($queue)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue.
     *
     * @return string
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * Set data.
     *
     * @param string $data
     *
     * @return Queue
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data.
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set status.
     *
     * @param int $status
     *
     * @return Queue
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Queue
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set scheduled.
     *
     * @param \DateTime $scheduled
     *
     * @return Queue
     */
    public function setScheduled($scheduled)
    {
        $this->scheduled = $scheduled;

        return $this;
    }

    /**
     * Get scheduled.
     *
     * @return \DateTime
     */
    public function getScheduled()
    {
        return $this->scheduled;
    }

    /**
     * Set executed.
     *
     * @param \DateTime|null $executed
     *
     * @return Queue
     */
    public function setExecuted($executed = null)
    {
        $this->executed = $executed;

        return $this;
    }

    /**
     * Get executed.
     *
     * @return \DateTime|null
     */
    public function getExecuted()
    {
        return $this->executed;
    }

    /**
     * Set finished.
     *
     * @param \DateTime|null $finished
     *
     * @return Queue
     */
    public function setFinished($finished = null)
    {
        $this->finished = $finished;

        return $this;
    }

    /**
     * Get finished.
     *
     * @return \DateTime|null
     */
    public function getFinished()
    {
        return $this->finished;
    }

    /**
     * Set priority.
     *
     * @param int|null $priority
     *
     * @return Queue
     */
    public function setPriority($priority = null)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority.
     *
     * @return int|null
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set message.
     *
     * @param string|null $message
     *
     * @return Queue
     */
    public function setMessage($message = null)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message.
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set trace.
     *
     * @param string|null $trace
     *
     * @return Queue
     */
    public function setTrace($trace = null)
    {
        $this->trace = $trace;

        return $this;
    }

    /**
     * Get trace.
     *
     * @return string|null
     */
    public function getTrace()
    {
        return $this->trace;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $queryResult;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->queryResult = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add queryResult.
     *
     * @param \Db\Entity\QueryResult $queryResult
     *
     * @return Queue
     */
    public function addQueryResult(\Db\Entity\QueryResult $queryResult)
    {
        $this->queryResult[] = $queryResult;

        return $this;
    }

    /**
     * Remove queryResult.
     *
     * @param \Db\Entity\QueryResult $queryResult
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeQueryResult(\Db\Entity\QueryResult $queryResult)
    {
        return $this->queryResult->removeElement($queryResult);
    }

    /**
     * Get queryResult.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQueryResult()
    {
        return $this->queryResult;
    }
}
