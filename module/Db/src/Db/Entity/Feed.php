<?php

namespace Db\Entity;

/**
 * Feed
 */
class Feed
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var int|null
     */
    private $userid;

    /**
     * @var \DateTime
     */
    private $time;

    /**
     * @var float|null
     */
    private $value;

    /**
     * @var string|null
     */
    private $units;

    /**
     * @var int|null
     */
    private $min;

    /**
     * @var int|null
     */
    private $max;

    /**
     * @var int|null
     */
    private $portfolio;

    /**
     * @var int|null
     */
    private $sensitivity;

    /**
     * @var int|null
     */
    private $type;

    /**
     * @var bool|null
     */
    private $moreIsBetter;

    /**
     * @var string|null
     */
    private $apikeyGet;

    /**
     * @var string|null
     */
    private $apikeyPost;

    /**
     * @var bool|null
     */
    private $isAlertable;

    /**
     * @var bool|null
     */
    private $isCumulative;

    /**
     * @var bool|null
     */
    private $isSetpoint;

    /**
     * @var float|null
     */
    private $setpoint;

    /**
     * @var bool|null
     */
    private $active;

    /**
     * @var \DateTime|null
     */
    private $lastUpdate;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $query;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->query = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return Feed
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set userid.
     *
     * @param int|null $userid
     *
     * @return Feed
     */
    public function setUserid($userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid.
     *
     * @return int|null
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set time.
     *
     * @param \DateTime $time
     *
     * @return Feed
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time.
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set value.
     *
     * @param float|null $value
     *
     * @return Feed
     */
    public function setValue($value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return float|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set units.
     *
     * @param string|null $units
     *
     * @return Feed
     */
    public function setUnits($units = null)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get units.
     *
     * @return string|null
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set min.
     *
     * @param int|null $min
     *
     * @return Feed
     */
    public function setMin($min = null)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get min.
     *
     * @return int|null
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set max.
     *
     * @param int|null $max
     *
     * @return Feed
     */
    public function setMax($max = null)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Get max.
     *
     * @return int|null
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set portfolio.
     *
     * @param int|null $portfolio
     *
     * @return Feed
     */
    public function setPortfolio($portfolio = null)
    {
        $this->portfolio = $portfolio;

        return $this;
    }

    /**
     * Get portfolio.
     *
     * @return int|null
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }

    /**
     * Set sensitivity.
     *
     * @param int|null $sensitivity
     *
     * @return Feed
     */
    public function setSensitivity($sensitivity = null)
    {
        $this->sensitivity = $sensitivity;

        return $this;
    }

    /**
     * Get sensitivity.
     *
     * @return int|null
     */
    public function getSensitivity()
    {
        return $this->sensitivity;
    }

    /**
     * Set type.
     *
     * @param int|null $type
     *
     * @return Feed
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return int|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set moreIsBetter.
     *
     * @param bool|null $moreIsBetter
     *
     * @return Feed
     */
    public function setMoreIsBetter($moreIsBetter = null)
    {
        $this->moreIsBetter = $moreIsBetter;

        return $this;
    }

    /**
     * Get moreIsBetter.
     *
     * @return bool|null
     */
    public function getMoreIsBetter()
    {
        return $this->moreIsBetter;
    }

    /**
     * Set apikeyGet.
     *
     * @param string|null $apikeyGet
     *
     * @return Feed
     */
    public function setApikeyGet($apikeyGet = null)
    {
        $this->apikeyGet = $apikeyGet;

        return $this;
    }

    /**
     * Get apikeyGet.
     *
     * @return string|null
     */
    public function getApikeyGet()
    {
        return $this->apikeyGet;
    }

    /**
     * Set apikeyPost.
     *
     * @param string|null $apikeyPost
     *
     * @return Feed
     */
    public function setApikeyPost($apikeyPost = null)
    {
        $this->apikeyPost = $apikeyPost;

        return $this;
    }

    /**
     * Get apikeyPost.
     *
     * @return string|null
     */
    public function getApikeyPost()
    {
        return $this->apikeyPost;
    }

    /**
     * Set isAlertable.
     *
     * @param bool|null $isAlertable
     *
     * @return Feed
     */
    public function setIsAlertable($isAlertable = null)
    {
        $this->isAlertable = $isAlertable;

        return $this;
    }

    /**
     * Get isAlertable.
     *
     * @return bool|null
     */
    public function getIsAlertable()
    {
        return $this->isAlertable;
    }

    /**
     * Set isCumulative.
     *
     * @param bool|null $isCumulative
     *
     * @return Feed
     */
    public function setIsCumulative($isCumulative = null)
    {
        $this->isCumulative = $isCumulative;

        return $this;
    }

    /**
     * Get isCumulative.
     *
     * @return bool|null
     */
    public function getIsCumulative()
    {
        return $this->isCumulative;
    }

    /**
     * Set isSetpoint.
     *
     * @param bool|null $isSetpoint
     *
     * @return Feed
     */
    public function setIsSetpoint($isSetpoint = null)
    {
        $this->isSetpoint = $isSetpoint;

        return $this;
    }

    /**
     * Get isSetpoint.
     *
     * @return bool|null
     */
    public function getIsSetpoint()
    {
        return $this->isSetpoint;
    }

    /**
     * Set setpoint.
     *
     * @param float|null $setpoint
     *
     * @return Feed
     */
    public function setSetpoint($setpoint = null)
    {
        $this->setpoint = $setpoint;

        return $this;
    }

    /**
     * Get setpoint.
     *
     * @return float|null
     */
    public function getSetpoint()
    {
        return $this->setpoint;
    }

    /**
     * Set active.
     *
     * @param bool|null $active
     *
     * @return Feed
     */
    public function setActive($active = null)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return bool|null
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set lastUpdate.
     *
     * @param \DateTime|null $lastUpdate
     *
     * @return Feed
     */
    public function setLastUpdate($lastUpdate = null)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate.
     *
     * @return \DateTime|null
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
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
     * Add query.
     *
     * @param \Db\Entity\Query $query
     *
     * @return Feed
     */
    public function addQuery(\Db\Entity\Query $query)
    {
        $this->query[] = $query;

        return $this;
    }

    /**
     * Remove query.
     *
     * @param \Db\Entity\Query $query
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeQuery(\Db\Entity\Query $query)
    {
        return $this->query->removeElement($query);
    }

    /**
     * Get query.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuery()
    {
        return $this->query;
    }
}
