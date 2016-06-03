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
        return $this->getParameter('x_login');
    }

    public function setXLogin($value) {
        return $this->setParameter('x_login', $value);
    }

    public function getXTransKey() {
        return $this->getParameter('x_trans_key');
    }

    public function setXTransKey($value) {
        return $this->setParameter('x_trans_key', $value);
    }

    public function request(array $parameters = array(), $payment_action) {
        return $this->createRequest('\Omnipay\Astropay\Message\PurchaseRequest', $parameters);
    }
}
