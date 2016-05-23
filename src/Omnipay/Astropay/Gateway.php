<?php
namespace Omnipay\Astropay;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway {

    public function getName() {
        return 'Astropay';
    }

    public function getDefaultParameters() {
        return array(
            'x_login' => '',
            'x_trans_key' => '',
            'testMode'  => false
        );
    }

    public function getXLogin() {
        return $this->getParameter('XLogin');
    }

    public function setXLogin($value) {
        return $this->setParameter('XLogin', $value);
    }

    public function getXTransKey() {
        return $this->getParameter('XTransKey');
    }

    public function setXTransKey($value) {
        return $this->setParameter('XTransKey', $value);
    }

    public function purchase(array $parameters = array()) {
        return $this->createRequest('\Omnipay\Astropay\Message\PurchaseRequest', $parameters);
    }
}
