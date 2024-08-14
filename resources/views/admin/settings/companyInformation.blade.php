<form class="needs-validation" novalidate>
    <div class="form-container vertical">
        <div class="grid grid-flow-row-dense grid-cols-3 grid-rows-1">
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomEmail">Mağaza Adı</label>
                <input id="validationCustomEmail" class="input form-control" type="email" value="{{$company->title}}" readonly>
            </div>
            <div class="p-4">
                  <label class="form-label mb-2" for="validationCustomUsername">Satıcı ID (Cari No) <b class="text-red-500 font-smaller">*Değiştirilemez*</b> </label>
                 <input id="validationCustomUsername" class="input form-control" type="text"  value="{{$company->id}}"  readonly>
             </div>
        </div>
        <div class="grid grid-flow-row-dense grid-cols-3 grid-rows-1">
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomEmail">Kep Adresi</label>
                <input id="validationCustomEmail" class="input form-control" type="email"  value="{{$company->kep_address}}"  readonly>
            </div>
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomUsername">Mersis No</label>
                <input id="validationCustomUsername" class="input form-control" type="text"  value="{{$company->mersis_address}}"  readonly>
            </div>
        </div>
        <h4 class="mt-3 mb-2 title"> Şirketinize Ait Gelir İdaresi Başkanlığı Kayıtları </h4>
        <div data-v-16c48b9c="" class="description-wrapper"><span data-v-16c48b9c="">Aşağıdaki bilgileriniz Gelir İdaresi Başkanlığı aracılığı ile doğrulanmıştır. Hatalı olduğunu düşünüyorsanız <u>Satıcı Destek Hattı</u> üzerinden bizimle iletişime geçebilirsiniz.<br></span><!----></div>
        <div class="grid grid-flow-row-dense grid-cols-3 grid-rows-1">
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomEmail">Vergi Dairesi</label>
                <input id="validationCustomEmail" class="input form-control" type="text"  value="{{$company->tax_office}}"  readonly>
            </div>
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomUsername">Vergi No</label>
                <input id="validationCustomUsername" class="input form-control" type="text"  value="{{$company->tax_number}}"  readonly>
            </div>, <div class="p-4">
                <label class="form-label mb-2" for="validationCustomEmail">Şirket Ünvanı</label>
                <input id="validationCustomEmail" class="input form-control" type="text"  value="{{$company->company_name}}"  readonly>
            </div>
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomUsername">Şirket Türü No</label>
                <input id="validationCustomUsername" class="input form-control" type="text"  value="{{$company->company_type}}"  readonly>
            </div>
        </div>

    </div>
</form>

<script>
    (function () {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>