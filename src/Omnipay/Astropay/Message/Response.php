<?php

namespace Omnipay\Astropay\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse {

  public function isSuccessful() {
    return ($this->data['response_code'] == 1);
  }

  public function getMessage() {
    return $this->data['response_reason_text'];
  }

  public function getData() {
    return $this->data;
  }


  public function hasCallback() {
    return false;
  }

  public function getStatus() {
    return ($this->isSuccessful()) ? 4 : 3;
  }

  public function getTransactionId() {
    return $this->data['x_description'];
  }
}
