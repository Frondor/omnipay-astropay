<?php

namespace Omnipay\Astropay\Message;

class PurchaseRequest extends AbstractRequest {

    public function getData() {
        return $data;
    }

    public function sendData($data)
    {
        return new PurchaseResponse($this, $data);
    }
}
