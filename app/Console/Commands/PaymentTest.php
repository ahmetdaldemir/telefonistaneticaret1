<?php

namespace App\Console\Commands;

use App\Service\PaymentService;
use Illuminate\Console\Command;

class PaymentTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = [
            'cardName' => 'Ahmet DALDEMIR',
            'cardNumber' => '4159560047417732',
            'exp' => '08/24',
            'cvc' => '123',
            'price' => 1,
        ];
        $paymetnService = new PaymentService();
        $service = $paymetnService->process();
        $xx =$service->createPayment($data);
        if(!empty($xx->getErrors())){
            dd($xx->getErrors());
        }
        $xxx = $xx->getContent();
        $dd  = $this->threed_payment_fire($xxx,$data);
      echo $dd;
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
