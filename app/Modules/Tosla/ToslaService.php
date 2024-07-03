<?php namespace app\Modules\Tosla;

use App\Abstracts\PaymentMethodService;
use App\Modules\Tosla\Request\CreateHash;
use App\Modules\Tosla\Request\CreatePayment;
use App\Modules\Tosla\CreteHashContract;
use App\Modules\Tosla\Request\DoPayment;

class ToslaService extends PaymentMethodService implements CreteHashContract
{

    protected $hash;
    protected $cardData;


    public function createPayment(array $data)
    {

        $this->hash = $this->getAccessToken();
        $this->cardData = $data;
        $this->price = $data['price'];
        $this->order_id = $data['order_id'];
        $data = [
            'hashData' =>$this->hash,
            'creditData' => $data,
            'price' => $this->price,
            'order_id' => $this->order_id
        ];
        return new CreatePayment($this,$data);
    }

    public function doPayment(array $data)
    {

        $this->hash = $this->getAccessToken();
        $data = [
            'ThreeDSessionId' =>$data['ThreeDSessionId'],
            'creditData' => $this->cardData
        ];
        return new DoPayment($this,$data);
    }

    public function getAccessToken(): ?array
    {
       $createHash = new CreateHash($this);
       return [
           'hash' => $createHash->getHash(),
           'rnd' =>$createHash->getRnd(),
           'timeSpan' =>$createHash->getTimeSpan()
       ];

    }

    public function threed_payment_fire($xxx,$data)
    {

        $form = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
        $form .= "<html>";
        $form .= "<body>";
        $form .= "<form action=\"https://prepentegrasyon.tosla.com/api/Payment/ProcessCardForm\" method=\"post\" id=\"threed_form\"/>";

        $form .= "<input type=\"hidden\" name=\"ThreeDSessionId\" value=\"" . $xxx['ThreeDSessionId'] . "\"/>";

        $form .= "<input type=\"hidden\" name=\"CardHolderName\" value=\"" . $data['cardName'] . "\"/>";

        $form .= "<input type=\"hidden\" name=\"CardNo\" value=\"" . $data['cardNumber'] . "\"/>";

        $form .= "<input type=\"hidden\" name=\"Cvv\" value=\"" . $data['cvc'] . "\"/>";

        $form .= "<input type=\"hidden\" name=\"ExpireDate\" value=\"" . $data['exp'] . "\"/>";

        $form .= "<input type=\"hidden\" name=\"installment\" value=\"0\"/>";

        $form .= "<input type=\"submit\" value=\"Öde\" style=\"display:none;\"/>";
        $form .= "<noscript>";
        $form .= "<br/>";
        $form .= "<br/>";
        $form .= "<center>";
        $form .= "<h1>3D Secure Yönlendirme İşlemi</h1>";
        $form .= "<h2>Javascript internet tarayıcınızda kapatılmış veya desteklenmiyor.<br/></h2>";
        $form .= "<h3>Lütfen banka 3D Secure sayfasına yönlenmek için tıklayınız.</h3>";
        $form .= "<input type=\"submit\" value=\"3D Secure Sayfasına Yönlen\">";
        $form .= "</center>";
        $form .= "</noscript>";
        $form .= "</form>";
        $form .= "</body>";
        $form .= "<script>document.getElementById(\"threed_form\").submit();</script>";
        $form .= "</html>";

        return $form;
    }
}
