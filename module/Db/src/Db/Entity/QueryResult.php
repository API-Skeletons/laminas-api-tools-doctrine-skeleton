<?php

namespace Db\Entity;

/**
 * QueryResult
 */
class QueryResult
{
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $jobName;

    /**
     * @var array|null
     */
    private $jobContent;

    /**
     * @var string
     */
    private $result;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Db\Entity\Query
     */
    private $query;


    /**
     * Set createdAt.
     *
     * @param \DateTime $createdAt
     *
     * @return QueryResult
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set jobName.
     *
     * @param string $jobName
     *
     * @return QueryResult
     */
    public function setJobName($jobName)
    {
        $this->jobName = $jobName;

        return $this;
    }

    /**
     * Get jobName.
     *
     * @return string
     */
    public function getJobName()
    {
        return $this->jobName;
    }

    /**
     * Set jobContent.
     *
     * @param array|null $jobContent
     *
     * @return QueryResult
     */
    public function setJobContent($jobContent = null)
    {
        $this->jobContent = $jobContent;

        return $this;
    }

    /**
     * Get jobContent.
     *
     * @return array|null
     */
    public function getJobContent()
    {
        return $this->jobContent;
    }

    /**
     * Set result.
     *
     * @param string $result
     *
     * @return QueryResult
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result.
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
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
     * Set query.
     *
     * @param \Db\Entity\Query|null $query
     *
     * @return QueryResult
     */
    public function setQuery(\Db\Entity\Query $query = null)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get query.
     *
     * @return \Db\Entity\Query|null
     */
    public function getQuery()
    {
        return $this->query;
    }
    /**
     * @var \Db\Entity\Queue
     */
    private $queue;


    /**
     * Set queue.
     *
     * @param \Db\Entity\Queue $queue
     *
     * @return QueryResult
     */
    public function setQueue(\Db\Entity\Queue $queue)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue.
     *
     * @return \Db\Entity\Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }
}
