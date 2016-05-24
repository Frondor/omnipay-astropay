<?php

namespace Omnipay\Astropay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface {

    public function __construct(RequestInterface $request, $data) {
        $this->request = $request;
        $this->data = $data;
    }

    public function isSuccessful() {
        return false;
    }
}
