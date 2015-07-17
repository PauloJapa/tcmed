<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ShellController extends AbstractActionController {

    /**
     *
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    protected $service;

    public function indexAction() {
        echo "hello", "\r\n";
    }

    /**
     * Seta todos os users offline que estão inativos no sistema por mais de 3 min
     * Adicionar esta linha no crontab do servidor
     * # m  h  dom mon dow   command
     * 03  *    *   *   *   php /var/www/tcmed/public/index.php setOffline
     * 03  *    *   *   *   /usr/bin/php5 /var/www/tcmed/public/index.php setOffline
     */
    public function setofflineAction() {
        $userRep = $this->getEm()->getRepository("\Application\Entity\User");
        $datetime = new \DateTime('now');
        $datetime->sub(new \DateInterval('PT3M'));
        $userRep->setAllInactiveOffLine($datetime);
    }

    /**
     * 
     * @return \Application\Service\Shell
     */
    public function getService() {
        if (null === $this->service) {
            $this->service = new \Application\Service\Shell($this->getEm());
        }
        return $this->service;
    }

    /**
     * Pega ou cria a instancia do DoctrineManage
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm() {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

}
