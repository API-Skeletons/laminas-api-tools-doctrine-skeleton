<?php

namespace ApiSkeletons\OAuth2\Doctrine\Entity;

/**
 * Jwt
 */
class Jwt
{
    /**
     * @var string|null
     */
    private $subject;

    /**
     * @var string|null
     */
    private $publicKey;

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
     * @return Jwt
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
     * Set publicKey.
     *
     * @param string|null $publicKey
     *
     * @return Jwt
     */
    public function setPublicKey($publicKey = null)
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    /**
     * Get publicKey.
     *
     * @return string|null
     */
    public function getPublicKey()
    {
        return $this->publicKey;
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
     * @return Jwt
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
