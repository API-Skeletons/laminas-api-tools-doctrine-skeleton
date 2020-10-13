<?php

namespace Db\Entity;

/**
 * Query
 */
class Query
{
    /**
     * @var string
     */
    private $feedName;

    /**
     * @var string
     */
    private $query;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Db\Entity\Feed
     */
    private $feed;


    /**
     * Set feedName.
     *
     * @param string $feedName
     *
     * @return Query
     */
    public function setFeedName($feedName)
    {
        $this->feedName = $feedName;

        return $this;
    }

    /**
     * Get feedName.
     *
     * @return string
     */
    public function getFeedName()
    {
        return $this->feedName;
    }

    /**
     * Set query.
     *
     * @param string $query
     *
     * @return Query
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get query.
     *
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
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
     * Set feed.
     *
     * @param \Db\Entity\Feed $feed
     *
     * @return Query
     */
    public function setFeed(\Db\Entity\Feed $feed)
    {
        $this->feed = $feed;

        return $this;
    }

    /**
     * Get feed.
     *
     * @return \Db\Entity\Feed
     */
    public function getFeed()
    {
        return $this->feed;
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
     * @return Query
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
