<?php

namespace Db\Entity;

use ApiSkeletons\OAuth2\Doctrine\Entity\UserInterface as OAuth2UserInterface;
use ApiSkeletons\OAuth2\Doctrine\Permissions\Acl\Role\ProviderInterface;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * User
 */
class User implements
    OAuth2UserInterface,
    ProviderInterface,
    ArraySerializableInterface
{

    public function getArrayCopy(): array
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'email' => $this->getEmail(),
        ];
    }

    public function exchangeArray(array $data)
    {
        foreach ($data as $field => $value) {
            switch (strtolower($field)) {
                case 'username':
                    $this->setUsername($value);
                    break;
                case 'password':
                    $this->setPassword($value);
                    break;
                case 'email':
                    $this->setEmail($value);
                    break;
                default:
                    break;
            }
        }

        return $this;
    }

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $client;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $accessToken;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $authorizationCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $refreshToken;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
        $this->accessToken = new \Doctrine\Common\Collections\ArrayCollection();
        $this->authorizationCode = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refreshToken = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
     * Add client.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Client $client
     *
     * @return User
     */
    public function addClient(\ApiSkeletons\OAuth2\Doctrine\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Client $client
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeClient(\ApiSkeletons\OAuth2\Doctrine\Entity\Client $client)
    {
        return $this->client->removeElement($client);
    }

    /**
     * Get client.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add accessToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken
     *
     * @return User
     */
    public function addAccessToken(\ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken)
    {
        $this->accessToken[] = $accessToken;

        return $this;
    }

    /**
     * Remove accessToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAccessToken(\ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken)
    {
        return $this->accessToken->removeElement($accessToken);
    }

    /**
     * Get accessToken.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Add authorizationCode.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode
     *
     * @return User
     */
    public function addAuthorizationCode(\ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode)
    {
        $this->authorizationCode[] = $authorizationCode;

        return $this;
    }

    /**
     * Remove authorizationCode.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAuthorizationCode(\ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode)
    {
        return $this->authorizationCode->removeElement($authorizationCode);
    }

    /**
     * Get authorizationCode.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * Add refreshToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken
     *
     * @return User
     */
    public function addRefreshToken(\ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken)
    {
        $this->refreshToken[] = $refreshToken;

        return $this;
    }

    /**
     * Remove refreshToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRefreshToken(\ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken)
    {
        return $this->refreshToken->removeElement($refreshToken);
    }

    /**
     * Get refreshToken.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $role;

    public function hasRole($roleId)
    {
        $roleId = strtolower($roleId);

        foreach ($this->getRole() as $role) {
            if ($role->getRoleId() == $roleId) {
                return true;
            }
        }

        return false;
    }



    /**
     * Add role.
     *
     * @param \Db\Entity\Role $role
     *
     * @return User
     */
    public function addRole(\Db\Entity\Role $role)
    {
        $this->role[] = $role;

        return $this;
    }

    /**
     * Remove role.
     *
     * @param \Db\Entity\Role $role
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRole(\Db\Entity\Role $role)
    {
        return $this->role->removeElement($role);
    }

    /**
     * Get role.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @var int|null
     */
    private $createdAt;

    /**
     * Set createdAt.
     *
     * @param datetime $createdAt
     *
     * @return User
     */
    public function setCreatedAt(datetime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
