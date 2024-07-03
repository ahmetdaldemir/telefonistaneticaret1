<?php

namespace App\Http\Controllers\Ecommerce;


use Amocart\Cart\Cart;
use App\Events\CheckoutRequested;
use App\Events\OrderCompleted;
use App\Events\OrderRepair;
use App\Events\SendEmailEvent;
use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\City;
use App\Models\CompanyShippingSetting;
use App\Models\Customer;
use App\Models\EcommerceSetting;
use App\Models\Faq;
use App\Models\MonthlyDeal;
use App\Models\Order;
use App\Models\Product;
use App\Models\RepairOrder;
use App\Models\Shipping;
use App\Models\Slider;
use App\Models\Unsubscribe;
use App\Models\Wishlist;
use App\Service\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Newsletter\Facades\Newsletter;


class EcommerceController extends Controller
{


    protected $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }

    public function index()
    {
        $data['2'] = '';
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['banners'] = Banner::where('status', 1)->get();
        $data['brands'] = Brand::all();
        $data['mounthDeals'] = MonthlyDeal::all();
        return view('ecommerce/index', $data);
    }

    public function detail(Request $request)
    {
        $data['product'] = Product::where('slug', $request->slug)->first();
        return view('ecommerce/detail', $data);
    }

    public function support_guest(Request $request)
    {
        $data['1'] = '';
        return view('ecommerce/support_guest', $data);
    }

    public function sss()
    {
        $data['faqs'] = Faq::all();
        return view('ecommerce/sss', $data);
    }


    public function freeshipping()
    {
        $data['products'] = Product::where('freeShipping', 1)->get();
        return view('ecommerce/list', $data);
    }

    public function bundle()
    {
        $data['products'] = Product::where('bundle', 1)->get();
        return view('ecommerce/bundle', $data);
    }

    public function information(Request $request)
    {
        $data['information'] = EcommerceSetting::where('slug', $request->slug)->first();
        return view('ecommerce/information', $data);
    }

    public function siparis_takip()
    {
        $data['1'] = '';
        return view('ecommerce/order_tracking', $data);
    }

    public function register()
    {
        $data['1'] = '';
        return view('ecommerce/register', $data);
    }

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'firstname.required' => 'İsim alanı zorunludur.',
            'lastname.required' => 'Soyisim alanı zorunludur.',
            'email.required' => 'E-posta adresi alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifre en az :min karakter olmalıdır.',
        ]);

        // Doğrulama başarısız olursa
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->fullname = $request->firstname . ' ' . $request->lastname;
        $customer->password = bcrypt($request->password);
        $customer->save();
        redirect()->to('login');
    }


    public function login()
    {
        $data['1'] = '';
        return view('ecommerce/login', $data);
    }

    public function order_tracking_get(Request $request)
    {
        return response()->json('Order Buluanmadi', 200);
    }


    public function add_to_cart(Request $request)
    {
        $message = 'Sepet Guncellenirken Sorun Olustu';

        $product = Product::find($request->id);
        $item = [
            'product_id' => (int)$request->id,
            'sku' => $product->productCode,
            'description' => $product->name,
            'price' => $product->bulkDiscountPrice,
            'quantity' => 1
        ];
        $response = $this->cart->add($item);
        if ($response) {
            $message = 'Sepet Guncellendi';
        }
        return response()->json($message, 200);
    }

    public function newsletterStore(Request $request)
    {
        Newsletter::subscribe($request->email);
    }

    public function add_wishlist($id)
    {
        $wishlist = Wishlist::firstOrNew([
            'ip' => request()->ip(),
            'product_id' => $id
        ]);
        $wishlist->company_id = auth()->user()->company_id ?? 1;
        if ($wishlist->exists) {
            return response()->json('Daha once eklenmistir');
        } else {
            $wishlist->save();
            return response()->json('Eklenmistir');
        }
    }

    public function cart_delete(Request $request)
    {
        $this->cart->delete($request->cart_id, $request->product_id);
        return redirect()->back();
    }

    public function basket()
    {
        if ($this->cart->all() == false) {
            return redirect()->to('/');
        } else {
            $cartCount = $this->cart->all()['count'];
            if ($cartCount == 0) {
                return redirect()->to('/');
            }
        }

        $data['2'] = '';
        $data['carts'] = $this->cart->all();
        $data['total'] = $this->cart->total();
        $data['cities'] = City::all();
        $data['shippings'] = CompanyShippingSetting::where('status', 1)->get();

        return view('ecommerce/basket', $data);

    }

    protected function checkout(Request $request)
    {
        if (!auth()->guard('web')->check() || $request->filled('addressSelected')) {
            $customer = event(new CheckoutRequested($request->all()))[0];
        } else {
            $customer = Customer::find(Auth::guard('web')->user()->id);
        }

        $address = $customer->customerAddress()->orderBy('id', 'desc')->first();
        $invoice = $customer->customerInvoice()->orderBy('id', 'desc')->first();

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->customer_address_id = $address->id;
        $order->customer_invoice_id = $invoice->id ?? null;
        $order->shipping_id = $request->shipping_id;
        $order->order_status = 'PAYMENT_WAIT';
        $order->total_price = $this->cart->total();
        $order->total_tax = $this->cart->total() * 0.20;
        $order->sub_price = $this->cart->total();
        $order->save();

        event(new OrderRepair($order));

        if ($request->payment_type == 'credit_card') {
            $data = [
                'cardName' => $request->input('card-name'),
                'cardNumber' => $request->input('card-number'),
                'exp' => $request->input('expiry-month') . '/' . substr($request->input('expiry-year'), -2),
                'cvc' => $request->input('cvv'),
                'price' => 1,
                'order_id' => $order->id,
            ];
            $paymetnService = new PaymentService();
            $service = $paymetnService->process();
            $xx = $service->createPayment($data);

            if (!empty($xx->getErrors())) {
                dd($xx->getErrors());
            }
            $xxx = $xx->getContent();
            if ($xxx['Message'] == 'Başarılı') {
                $dd = $this->threed_payment_fire($xxx, $data);
                echo $dd;
            }
        } else {
            return redirect()->route('checkout_complate', [
                "ClientId" => "1000000494",
                "OrderId" => $order->id,
                "MdStatus" => "1",
                "ThreeDSessionId" => "P4DCA6F8759AF4B459A6A69A1EF8F835D8D564C6598BE4BC49038C4A9EBBEADF8",
                "BankResponseCode" => "00",
                "BankResponseMessage" => null,
                "RequestStatus" => "1",
                "HashParameters" => "ClientId,ApiUser,OrderId,MdStatus,BankResponseCode,BankResponseMessage,RequestStatus",
                "Hash" => "nV9XxkWKiEuYAVhXbWAtZMmf6ZQ/KXhKKXINXNfSAGc7Q7dbi4mUyYBRJRI6pmIm8M6TCeSD690dzPA+sOIdSQ==",
            ]);
        }

    }

    protected function checkout_complate(Request $request)
    {
        $order = Order::find($request['OrderId']);
        if ($request['MdStatus'] == 1) {
            $order->order_status = 'PAYMENT_CONFIRM';
            $order->save();
            event(new OrderCompleted($order));
            $this->cart->cartTrush();
        }
        $data['title'] = 'Phone Hospital';
        $data['logo'] = 'Phone Hospital';
        $data['request'] = $request;
        $data['order'] = $order;


        return view('checkout_complate', $data);
    }


    public function contact()
    {
        $data['2'] = '';
        return view('ecommerce/contact', $data);
    }

    public function profil()
    {
        if (!\auth()->guard('web')->check()) {
            return redirect()->to('/');
        }
        $data['2'] = '';
        return view('ecommerce/profil/index', $data);
    }

    public function sendMail(Request $request)
    {
        Mail::to('info@phonehospital.com')->send(new SendEmail('Siteden Mail Geldi', $request));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    public function cartTotal()
    {
        $totalPrice = 0;
        $items = $this->cart->all();

        foreach ($items['items'] as $v) {
            $price = Product::find($v->product_id);
            $totalPrice += $price->bulkDiscountPrice * $v->quantity;
        }
        return response()->json($totalPrice, 200);
    }

    public function shipping(Request $request)
    {
        return response()->json(CompanyShippingSetting::where('shipping_id', $request->id)->where('company_id', 1)->first(), 200);
    }


    public function threed_payment_fire($xxx, $data)
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

    public function unsubscribe_link_here(Request $request)
    {
        $uns = new Unsubscribe();
        $uns->company_id = 1;
        $uns->value = base64_decode($request->email);
        $uns->save();
        return redirect()->to('/');
    }
}
