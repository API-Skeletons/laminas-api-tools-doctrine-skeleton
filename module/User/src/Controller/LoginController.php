<?php

namespace User\Controller;

use DateTime;
use Application\Authentication\AuthenticationServiceAwareInterface;
use Application\Authentication\AuthenticationServiceAwareTrait;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\Session\Container;
use Laminas\Authentication\AuthenticationService;
use Laminas\Authentication\Storage\Session as SessionStorage;
use Laminas\Authentication\Result as AuthenticationResult;
use Laminas\Http\Request as HttpRequest;
use Laminas\ApiTools\MvcAuth\Identity\GuestIdentity;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use DoctrineModule\Authentication\Adapter\ObjectRepository;
use Db\Entity;

class LoginController extends AbstractActionController implements
    ObjectManagerAwareInterface,
    AuthenticationServiceAwareInterface
{
    use ProvidesObjectManager;
    use AuthenticationServiceAwareTrait;

    private $authenticationAdapter;

    public function __construct(
        AuthenticationService $authenticationService,
        ObjectRepository $authenticationAdapter,
        ObjectManager $objectManager)
    {
        $this->setAuthenticationService($authenticationService);
        $this->setAuthenticationAdapter($authenticationAdapter);
        $this->setObjectManager($objectManager);
    }

    public function getAuthenticationAdapter()
    {
        return $this->authenticationAdapter;
    }

    public function setAuthenticationAdapter(ObjectRepository $authenticationAdapter)
    {
        $this->authenticationAdapter = $authenticationAdapter;

        return $this;
    }

    public function logoutAction()
    {
        session_unset();
        session_destroy();

        $redirect = ($this->params()->fromQuery('redirect')) ?: '/';

        return $this->plugin('redirect')->toUrl($redirect);
    }

    public function loginAction()
    {
        if (($this->getRequest() instanceof HttpRequest || $this->getRequest() instanceof \Laminas\ApiTools\ContentNegotiation\Request)
            && $this->getRequest()->isPost()
            && $this->params()->fromPost('email')
            && $this->params()->fromPost('password')
        ) {
            $adapter = $this->getAuthenticationAdapter();
            $adapter
                ->setIdentity($this->params()->fromPost('email'))
                ->setCredential($this->params()->fromPost('password'))
                ;

            $this->getAuthenticationService()->setAdapter($adapter);
            $this->getAuthenticationService()->setStorage(new SessionStorage('webauth'));

            $result = $this->getAuthenticationService()->authenticate();

            switch ($result->getCode()) {
                case AuthenticationResult::SUCCESS:
                    $session = new Container('webauth');
                    $session->offsetSet('auth', $result->getIdentity()->getId());

                    $redirect = ($session->offsetGet('redirect')) ?? '/';
                    $session->offsetSet('redirect', null);

                    return $this->plugin('redirect')->toUrl($redirect);
                    break;

                case AuthenticationResult::FAILURE_IDENTITY_NOT_FOUND:
                    return new ViewModel([
                        'email' => $this->params()->fromPost('email'),
                        'result' => AuthenticationResult::FAILURE_IDENTITY_NOT_FOUND,
                    ]);
                    break;

                case AuthenticationResult::FAILURE_CREDENTIAL_INVALID:
                    return new ViewModel([
                        'email' => $this->params()->fromPost('email'),
                        'result' => AuthenticationResult::FAILURE_CREDENTIAL_INVALID,
                    ]);
                    break;

                case AuthenticationResult::FAILURE:
                case AuthenticationResult::FAILURE_IDENTITY_AMBIGUOUS:
                case AuthenticationResult::FAILURE_UNCATEGORIZED:
                default:
                    return new ViewModel([
                        'email' => $this->params()->fromPost('email'),
                        'result' => AuthenticationResult::FAILURE_UNCATEGORIZED,
                    ]);
                    break;
            }
        }

        return new ViewModel();
    }
}
