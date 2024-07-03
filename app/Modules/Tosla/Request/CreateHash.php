<?php

namespace app\Modules\Tosla\Request;

use app\Abstracts\PaymentMethodService;
use App\Abstracts\PaymentMethodServiceRequest;
use App\Helpers\HashHelper;
use App\Service\PaymentService;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use SoapClient;
date_default_timezone_set("Europe/Istanbul");

class CreateHash extends PaymentMethodServiceRequest
{
    protected $rnd;
    protected $timeSpan;
    protected $hash;

    public function __construct(PaymentMethodService $paymentMethodService)
    {
        $apiPass = $paymentMethodService->apiSecret();
        $clientId = $paymentMethodService->clientId();
        $apiUser = $paymentMethodService->apiKey();
        $this->rnd = $this->generateRandomString(10);

        $this->timeSpan = Carbon::now('Europe/Istanbul')->format('YmdHis');

        $hash = new HashHelper();
        $hash = $hash->generateHash($apiPass, $clientId, $apiUser, $this->rnd, $this->timeSpan);
        $this->setHash($hash);
    }
    function generateRandomString($length = 10) {
        // Rastgele 24 karakter uzunluğunda bir dize oluştur
        return substr(bin2hex(random_bytes($length)), 0, $length);
    }


    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function getRnd()
    {
        return $this->rnd;
    }

    public function getTimeSpan()
    {
        return $this->timeSpan;
    }
}
