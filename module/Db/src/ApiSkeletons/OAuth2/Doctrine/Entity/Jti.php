<?php

namespace ApiSkeletons\OAuth2\Doctrine\Entity;

/**
 * Jti
 */
class Jti
{
    /**
     * @var string|null
     */
    private $subject;

    /**
     * @var string|null
     */
    private $audience;

    /**
     * @var \DateTime|null
     */
    private $expires;

    /**
     * @var string|null
     */
    private $jti;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \ApiSkeletons\OAuth2\Doctrine\Entity\Client
     */
    private $client;


    /**
     * Set subject.
     *
     * @param string|null $subject
     *
     * @return Jti
     */
    public function setSubject($subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject.
     *
     * @return string|null
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set audience.
     *
     * @param string|null $audience
     *
     * @return Jti
     */
    public function setAudience($audience = null)
    {
        $this->audience = $audience;

        return $this;
    }

    /**
     * Get audience.
     *
     * @return string|null
     */
    public function getAudience()
    {
        return $this->audience;
    }

    /**
     * Set expires.
     *
     * @param \DateTime|null $expires
     *
     * @return Jti
     */
    public function setExpires($expires = null)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires.
     *
     * @return \DateTime|null
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set jti.
     *
     * @param string|null $jti
     *
     * @return Jti
     */
    public function setJti($jti = null)
    {
        $this->jti = $jti;

        return $this;
    }

    /**
     * Get jti.
     *
     * @return string|null
     */
    public function getJti()
    {
        return $this->jti;
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
     * Set client.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Client $client
     *
     * @return Jti
     */
    public function setClient(\ApiSkeletons\OAuth2\Doctrine\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client.
     *
     * @return \ApiSkeletons\OAuth2\Doctrine\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
