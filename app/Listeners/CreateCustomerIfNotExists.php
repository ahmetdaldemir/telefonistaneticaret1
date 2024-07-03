<?php

namespace App\Listeners;

use App\Events\CheckoutRequested;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerInvoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use function Symfony\Component\Translation\t;

class CreateCustomerIfNotExists
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\CheckoutRequested $event
     * @return void
     */
    public function handle(CheckoutRequested $event)
    {
        $event = json_decode(json_encode($event));
        $customer = Customer::updateOrCreate(['email' => $event->requestData->email], [
            'code' => Str::uuid(),
            'fullname' => $event->requestData->firstname . ' ' . $event->requestData->lastname,
            'tc' => $event->requestData->tc ?? null,
            'phone' => $event->requestData->phone ?? null,
            'address' => $event->requestData->address ?? null,
            'city' => $event->requestData->city_id ?? null,
            'district' => $event->requestData->town_id ?? null,
            'email' => $event->requestData->email ?? null,
            'company_id' => 1, // TODO  Bu alan firmaya gore kodlanacak
            'seller_id' => 1,
            'firstname' => $event->requestData->firstname,
            'lastname' => $event->requestData->lastname,
            'password' => rand(000000, 999999),

        ]);
        $this->customerInvoice($event->requestData, $customer);
        $this->customerAddress($event->requestData, $customer);
        return $customer;
    }

    public function customerInvoice($request, $customer)
    {
        if (isset($request->invoice_tax) && isset($request->invoice_tax_office) && isset($request->invoice_company_name)) {
            $customerInvoice = new CustomerInvoice();
            $customerInvoice->customer_id = $customer->id;
            $customerInvoice->tax_number = $request->invoice_tax;
            $customerInvoice->tax_office = $request->invoice_tax_office;
            $customerInvoice->company_name = $request->invoice_company_name;
            $customerInvoice->invoice_e_invoce = $request->invoice_e_invoce ?? 0;
            $customerInvoice->save();
        }
    }

    public function customerAddress($request, $customer)
    {
        $customerAddress = new CustomerAddress();
        $customerAddress->customer_id = $customer->id;
        $customerAddress->name = $customer->fullname;
        $customerAddress->type = 'shipping';
        $customerAddress->city = $request->city_id ?? null;
        $customerAddress->district = $request->town_id ?? null;
        $customerAddress->address =  $request->address ?? null;
        $customerAddress->phone = $request->phone ?? null;
        $customerAddress->addressSelect = 'home';
        $customerAddress->save();
    }


}
