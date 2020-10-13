<?php

namespace ApiSkeletons\OAuth2\Doctrine\Entity;

/**
 * PublicKey
 */
class PublicKey
{
    /**
     * @var string|null
     */
    private $publicKey;

    /**
     * @var string|null
     */
    private $privateKey;

    /**
     * @var string|null
     */
    private $encryptionAlgorithm;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \ApiSkeletons\OAuth2\Doctrine\Entity\Client
     */
    private $client;


    /**
     * Set publicKey.
     *
     * @param string|null $publicKey
     *
     * @return PublicKey
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
     * Set privateKey.
     *
     * @param string|null $privateKey
     *
     * @return PublicKey
     */
    public function setPrivateKey($privateKey = null)
    {
        $this->privateKey = $privateKey;

        return $this;
    }

    /**
     * Get privateKey.
     *
     * @return string|null
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * Set encryptionAlgorithm.
     *
     * @param string|null $encryptionAlgorithm
     *
     * @return PublicKey
     */
    public function setEncryptionAlgorithm($encryptionAlgorithm = null)
    {
        $this->encryptionAlgorithm = $encryptionAlgorithm;

        return $this;
    }

    /**
     * Get encryptionAlgorithm.
     *
     * @return string|null
     */
    public function getEncryptionAlgorithm()
    {
        return $this->encryptionAlgorithm;
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
     * @return PublicKey
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
