<div class="modal fade" id="priceStockUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog dialog">
        <div class="dialog-content">
            <div  class="modal__wrapper">
                <div class="modal__container">
                    <div>
                         <img style="margin: 0 auto" src="{{asset('admin/img/box.png')}}">
                    </div>
                    <div style="text-align: center"><h1  class="modal__container__title">Toplu Fiyat ve Stok  Güncelle</h1>
                        <p  class="modal__container__desc"> Seçtiğiniz ürünlerin fiyat ve stoklarını
                            güncellemek için güncellemek istediğiniz alanlara giriş yapabilirsiniz. </p></div>
                </div>
                <div  class="modal-content">
                    <div  class="modal__divider"></div>
                    <div  class="price-stock-info">
                        <form class="w-full">
                            <div  class="price-stock-content">
                                <fieldset  class="input-wrapper">
                                    <legend style="text-align: left" ><span ><label >Perakende Satış Fiyatı</label></span></legend>
                                    <input class="input" aria-invalid="true" name="retail_price" placeholder="0,00 ₺" aria-errormessage="'errorMessage'" inputmode="decimal">
                                </fieldset>
                                <fieldset  class="input-wrapper">
                                    <legend style="text-align: left" ><span ><label >İndirimli Satış Fiyatı</label></span></legend>
                                    <input class="input" aria-invalid="true" name="price" placeholder="0,00 ₺" aria-errormessage="'errorMessage'" inputmode="decimal">
                                </fieldset>
                                <fieldset  class="input-wrapper">
                                    <legend style="text-align: left" ><span ><label >Stok Miktarı</label></span></legend>
                                    <input class="input" aria-invalid="true"  name="quantity" aria-errormessage="'errorMessage'" inputmode="decimal" placeholder="0">
                                </fieldset>
                            </div>
                            <div  class="footer">
                                <button data-bs-dismiss="modal" type="button" class="btn btn-sm btn-default text-white"><span >Vazgeç</span></button>
                                <button class="btn btn-sm btn-solid text-white" onclick="updatePriceStock()" type="button"><span >Güncelle</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
