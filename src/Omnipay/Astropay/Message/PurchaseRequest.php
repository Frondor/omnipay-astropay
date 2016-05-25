<?php

namespace Omnipay\Astropay\Message;

class PurchaseRequest extends AbstractRequest {

    public function getData() {
      $data = parent::getData();
      $this->validate(
        'x_card_num',
        'x_card_code',
        'x_exp_date',
        'x_unique_id',
        'transactionId',
        'amount'
      );
      $data['x_card_num'] = $this->getXCardNum();
      $data['x_card_code'] = $this->getXCardCode();
      $data['x_exp_date'] = $this->getXExpDate();
      $data['x_unique_id'] = $this->getXUniqueId();
      $data['x_invoice_num'] = $this->getTransactionId();
      $data['x_amount'] = $this->getAmount();
      $data['x_type'] = "AUTH_CAPTURE";

      return $data;
    }

    public function getEndpoint() {
      return $this->endpoint.'/verif/validator';
    }
}
