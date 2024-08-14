<form class="needs-validation" method="post" action="{{route('supervisor.siteUpdate')}}" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-container vertical">
        <div class="grid grid-flow-row-dense grid-cols-3 grid-rows-1">
            <div class="p-4">
                <label class="form-label mb-2" for="logo">Logo</label>
                <input id="logo" class="input" name="logo" type="file">
            </div>
            <div class="p-4">
                  <label class="form-label mb-2" for="favicon">Favicon (64px*64px)</label>
                 <input id="favicon" class="input" name="favicon" type="file">
             </div>
        </div>
        <div class="grid grid-flow-row-dense grid-cols-4 grid-rows-1">
            @foreach($ecommerceSettings as $item)
                @if($item->type == 'general')
            <div class="p-4">
                <label class="form-label mb-2" for="validationCustomEmail">{{$item->name}}</label>
                <input id="validationCustomEmail" class="input form-control" value="{{$item->value}}" name="siteInformation[{{$item->slug}}][]" type="text">
            </div>
                @endif
            @endforeach
        </div>
        <div class="form-item vertical">
             <div>
                <button class="btn btn-solid float-right">Kaydet</button>
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

