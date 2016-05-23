<?php

namespace Omnipay\Astropay\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Guzzle\Http\Client as HttpClient;


class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface {
    protected $endpoint = '';

    public function __construct(RequestInterface $request, $data) {
        $this->request = $request;
        $this->data = $data;
    }

    public function isSuccessful() {
        return false;
    }

    public function isRedirect() {
        return true;
    }

    public function getRedirectUrl() {
        return $this->endpoint . '?' . http_build_query($this->data, '', '&');
    }

    public function getRedirectMethod() {
        return 'GET';
    }

    public function getRedirectData() {
        return null;
    }
}
