<?php

namespace ApiSkeletons\OAuth2\Doctrine\Entity;

/**
 * Client
 */
class Client
{
    /**
     * @var string|null
     */
    private $clientId;

    /**
     * @var string|null
     */
    private $secret;

    /**
     * @var string|null
     */
    private $redirectUri;

    /**
     * @var array|null
     */
    private $grantType;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \ApiSkeletons\OAuth2\Doctrine\Entity\PublicKey
     */
    private $publicKey;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $accessToken;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $refreshToken;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $authorizationCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jwt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jti;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $scope;

    /**
     * @var \Db\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->accessToken = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refreshToken = new \Doctrine\Common\Collections\ArrayCollection();
        $this->authorizationCode = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jwt = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jti = new \Doctrine\Common\Collections\ArrayCollection();
        $this->scope = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set clientId.
     *
     * @param string|null $clientId
     *
     * @return Client
     */
    public function setClientId($clientId = null)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set secret.
     *
     * @param string|null $secret
     *
     * @return Client
     */
    public function setSecret($secret = null)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * Get secret.
     *
     * @return string|null
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set redirectUri.
     *
     * @param string|null $redirectUri
     *
     * @return Client
     */
    public function setRedirectUri($redirectUri = null)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri.
     *
     * @return string|null
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set grantType.
     *
     * @param array|null $grantType
     *
     * @return Client
     */
    public function setGrantType($grantType = null)
    {
        $this->grantType = $grantType;

        return $this;
    }

    /**
     * Get grantType.
     *
     * @return array|null
     */
    public function getGrantType()
    {
        return $this->grantType;
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
     * Set publicKey.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\PublicKey|null $publicKey
     *
     * @return Client
     */
    public function setPublicKey(\ApiSkeletons\OAuth2\Doctrine\Entity\PublicKey $publicKey = null)
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    /**
     * Get publicKey.
     *
     * @return \ApiSkeletons\OAuth2\Doctrine\Entity\PublicKey|null
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * Add accessToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken
     *
     * @return Client
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
     * Add refreshToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken
     *
     * @return Client
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
     * Add authorizationCode.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode
     *
     * @return Client
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
     * Add jwt.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Jwt $jwt
     *
     * @return Client
     */
    public function addJwt(\ApiSkeletons\OAuth2\Doctrine\Entity\Jwt $jwt)
    {
        $this->jwt[] = $jwt;

        return $this;
    }

    /**
     * Remove jwt.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Jwt $jwt
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeJwt(\ApiSkeletons\OAuth2\Doctrine\Entity\Jwt $jwt)
    {
        return $this->jwt->removeElement($jwt);
    }

    /**
     * Get jwt.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJwt()
    {
        return $this->jwt;
    }

    /**
     * Add jti.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Jti $jti
     *
     * @return Client
     */
    public function addJti(\ApiSkeletons\OAuth2\Doctrine\Entity\Jti $jti)
    {
        $this->jti[] = $jti;

        return $this;
    }

    /**
     * Remove jti.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Jti $jti
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeJti(\ApiSkeletons\OAuth2\Doctrine\Entity\Jti $jti)
    {
        return $this->jti->removeElement($jti);
    }

    /**
     * Get jti.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJti()
    {
        return $this->jti;
    }

    /**
     * Add scope.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Scope $scope
     *
     * @return Client
     */
    public function addScope(\ApiSkeletons\OAuth2\Doctrine\Entity\Scope $scope)
    {
        $this->scope[] = $scope;

        return $this;
    }

    /**
     * Remove scope.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Scope $scope
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeScope(\ApiSkeletons\OAuth2\Doctrine\Entity\Scope $scope)
    {
        return $this->scope->removeElement($scope);
    }

    /**
     * Get scope.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set user.
     *
     * @param \Db\Entity\User|null $user
     *
     * @return Client
     */
    public function setUser(\Db\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \Db\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
