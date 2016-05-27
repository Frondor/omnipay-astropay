<?php

namespace Omnipay\Astropay\Message;

class PurchaseRequest extends AbstractRequest {

    public function getData() {
      $data = parent::getData();
      $this->validate(
        'card_num',
        'cvv',
        'exp_date',
        'UserId',
        'transactionId',
        'amount'
      );
      $data['x_card_num'] = $this->getCardNum();
      $data['x_card_code'] = $this->getCvv();
      $data['x_exp_date'] = $this->getExpDate();
      $data['x_unique_id'] = $this->getUserId();
      $data['x_invoice_num'] = $this->getTransactionId();
      $data['x_description'] = $this->getTransactionId();
      $data['x_amount'] = $this->getAmount();
      $data['x_type'] = "AUTH_CAPTURE";

      return $data;
    }

    public function getEndpoint() {
      return $this->endpoint.'/verif/validator';
    }
}
