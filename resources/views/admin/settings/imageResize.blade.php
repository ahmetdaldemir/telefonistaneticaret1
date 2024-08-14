<div class="alert alert-dismissible bg-primary-50 dark:bg-primary-500 text-primary-500 dark:text-primary-100">
    <div class="alert-content">
        <span class="text-2xl text-primary-400 dark:text-primary-100">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
        </span>
        <div>Dünya genelinde e-ticaret sitelerinde ve dijital platformlarda yaygın olarak kabul edilen ürün fotoğrafı ölçüleri, netlik, tutarlılık ve kullanıcı deneyimi açısından oldukça önemlidir. Ürün fotoğrafı ölçüleri, platforma, ürün türüne ve kullanıcı cihazlarına göre farklılık gösterebilir. </div>
    </div>
</div>


<form class="needs-validation" novalidate>
    <div class="form-container vertical">
        <div class="grid grid-flow-row-dense grid-cols-3 grid-rows-1">
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomEmail">Slider Ölçüsü</label>
                <select id="validationCustomEmail" name="sliderSize" class="input form-control">
                    <option value="1920*600">Full-Width -  1920*600</option>
                    <option value="1920*800">Full-Width -  1920*800</option>
                    <option value="1200*400">Standart -  1200*400</option>
                    <option value="1200*600">Standart -  1200*600</option>
                </select>
            </div>
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomEmail">Ürün Ölçüsü</label>
                <select id="validationCustomEmail" name="sliderSize" class="input form-control">
                    <option value="1000*1000">1000*1000</option>
                    <option value="1200*1200">1200*1200</option>
                    <option value="2000*2000">2000*2000</option>
                    <option value="800*600">800*600</option>
                </select>
            </div>
        </div>
        <!--div class="form-item vertical">
            <div>
                <button class="btn btn-solid float-right">Kaydet</button>
            </div>
        </div -->
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