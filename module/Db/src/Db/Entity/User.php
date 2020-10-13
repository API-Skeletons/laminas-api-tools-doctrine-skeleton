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
     * @var string|null
     */
    private $ipAddress;

    /**
     * @var string|null
     */
    private $salt;

    /**
     * @var string|null
     */
    private $activationCode;

    /**
     * @var string|null
     */
    private $forgottenPasswordCode;

    /**
     * @var int|null
     */
    private $forgottenPasswordTime;

    /**
     * @var string|null
     */
    private $rememberCode;

    /**
     * @var int|null
     */
    private $createdOn;

    /**
     * @var int|null
     */
    private $lastLogin;

    /**
     * @var bool|null
     */
    private $active;

    /**
     * @var string|null
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @var string|null
     */
    private $company;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var string|null
     */
    private $apikeyRead;

    /**
     * @var string|null
     */
    private $apikeyWrite;

    /**
     * @var string|null
     */
    private $property;

    /**
     * @var string|null
     */
    private $equipment;

    /**
     * @var string|null
     */
    private $chartType;


    /**
     * Set ipAddress.
     *
     * @param string|null $ipAddress
     *
     * @return User
     */
    public function setIpAddress($ipAddress = null)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress.
     *
     * @return string|null
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set salt.
     *
     * @param string|null $salt
     *
     * @return User
     */
    public function setSalt($salt = null)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt.
     *
     * @return string|null
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set activationCode.
     *
     * @param string|null $activationCode
     *
     * @return User
     */
    public function setActivationCode($activationCode = null)
    {
        $this->activationCode = $activationCode;

        return $this;
    }

    /**
     * Get activationCode.
     *
     * @return string|null
     */
    public function getActivationCode()
    {
        return $this->activationCode;
    }

    /**
     * Set forgottenPasswordCode.
     *
     * @param string|null $forgottenPasswordCode
     *
     * @return User
     */
    public function setForgottenPasswordCode($forgottenPasswordCode = null)
    {
        $this->forgottenPasswordCode = $forgottenPasswordCode;

        return $this;
    }

    /**
     * Get forgottenPasswordCode.
     *
     * @return string|null
     */
    public function getForgottenPasswordCode()
    {
        return $this->forgottenPasswordCode;
    }

    /**
     * Set forgottenPasswordTime.
     *
     * @param int|null $forgottenPasswordTime
     *
     * @return User
     */
    public function setForgottenPasswordTime($forgottenPasswordTime = null)
    {
        $this->forgottenPasswordTime = $forgottenPasswordTime;

        return $this;
    }

    /**
     * Get forgottenPasswordTime.
     *
     * @return int|null
     */
    public function getForgottenPasswordTime()
    {
        return $this->forgottenPasswordTime;
    }

    /**
     * Set rememberCode.
     *
     * @param string|null $rememberCode
     *
     * @return User
     */
    public function setRememberCode($rememberCode = null)
    {
        $this->rememberCode = $rememberCode;

        return $this;
    }

    /**
     * Get rememberCode.
     *
     * @return string|null
     */
    public function getRememberCode()
    {
        return $this->rememberCode;
    }

    /**
     * Set createdOn.
     *
     * @param int|null $createdOn
     *
     * @return User
     */
    public function setCreatedOn($createdOn = null)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn.
     *
     * @return int|null
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set lastLogin.
     *
     * @param int|null $lastLogin
     *
     * @return User
     */
    public function setLastLogin($lastLogin = null)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin.
     *
     * @return int|null
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set active.
     *
     * @param bool|null $active
     *
     * @return User
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
     * Set firstName.
     *
     * @param string|null $firstName
     *
     * @return User
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string|null $lastName
     *
     * @return User
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set company.
     *
     * @param string|null $company
     *
     * @return User
     */
    public function setCompany($company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company.
     *
     * @return string|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set phone.
     *
     * @param string|null $phone
     *
     * @return User
     */
    public function setPhone($phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set apikeyRead.
     *
     * @param string|null $apikeyRead
     *
     * @return User
     */
    public function setApikeyRead($apikeyRead = null)
    {
        $this->apikeyRead = $apikeyRead;

        return $this;
    }

    /**
     * Get apikeyRead.
     *
     * @return string|null
     */
    public function getApikeyRead()
    {
        return $this->apikeyRead;
    }

    /**
     * Set apikeyWrite.
     *
     * @param string|null $apikeyWrite
     *
     * @return User
     */
    public function setApikeyWrite($apikeyWrite = null)
    {
        $this->apikeyWrite = $apikeyWrite;

        return $this;
    }

    /**
     * Get apikeyWrite.
     *
     * @return string|null
     */
    public function getApikeyWrite()
    {
        return $this->apikeyWrite;
    }

    /**
     * Set property.
     *
     * @param string|null $property
     *
     * @return User
     */
    public function setProperty($property = null)
    {
        $this->property = $property;

        return $this;
    }

    /**
     * Get property.
     *
     * @return string|null
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Set equipment.
     *
     * @param string|null $equipment
     *
     * @return User
     */
    public function setEquipment($equipment = null)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Get equipment.
     *
     * @return string|null
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * Set chartType.
     *
     * @param string|null $chartType
     *
     * @return User
     */
    public function setChartType($chartType = null)
    {
        $this->chartType = $chartType;

        return $this;
    }

    /**
     * Get chartType.
     *
     * @return string|null
     */
    public function getChartType()
    {
        return $this->chartType;
    }
}
