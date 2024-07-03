var shippingData;
var cartTotalPrice;

function cartCalculate() {
// Event listener for changes to shipping input


    var checkedValues = [];

    // Get all checked shipping_id inputs
    $('input[name=shipping_id]:checked').each(function() {
        checkedValues.push($(this).val());
    });

    // First, get the cart total price
    cartTotal(function() {
        // Then, get the shipping price
        getShipping(checkedValues.join(", "), function() {
            if (shippingData && shippingData.price) {
                var shippingPrice = shippingData.price;
                var totalprice = cartTotalPrice;
                var t = parseFloat(shippingPrice) + parseFloat(totalprice);
                $('span#totalPrice').html(t + '₺');
            } else {
                console.error("Price bilgisi bulunamadı.");
            }
        });
    });
 }

function getShipping(id, callback) {
    $.ajax({
        url: '/shipping?id=' + id, // URL for shipping request
        type: 'GET', // Request type
        success: function(response) {
            shippingData = response;
            console.log(shippingData); // Log shipping data on success

            // Call the callback function if it exists
            if (typeof callback === "function") {
                callback();
            }
        },
        error: function(xhr, status, error) {
            console.error('İstek hatası:', status, error);
        }
    });
}

function cartTotal(callback) {
    $.ajax({
        url: '/cartTotal', // URL for cart total request
        type: 'GET', // Request type
        success: function(response) {
            cartTotalPrice = response;
            console.log(cartTotalPrice); // Log cart total on success

            // Call the callback function if it exists
            if (typeof callback === "function") {
                callback();
            }
        },
        error: function(xhr, status, error) {
            console.error('İstek hatası:', status, error);
        }
    });
}
function togglePaymentForm() {
    var creditCardOption = document.getElementById('payment-1');
    var creditCardForm = document.getElementById('credit-card-form');

    if (creditCardOption.checked) {
        creditCardForm.classList.remove('hidden');
        creditCardForm.classList.add('visible');
        $('#credit-card-form').find('input').attr('required', true);
        $('#credit-card-form').find('select').attr('required', true);
    } else {
        creditCardForm.classList.remove('visible');
        creditCardForm.classList.add('hidden');
    }
}

function populateExpiryYears() {
    var expiryYearSelect = document.getElementById('expiry-year');
    var currentYear = new Date().getFullYear();

    for (var i = 0; i <= 20; i++) {
        var option = document.createElement('option');
        option.value = currentYear + i;
        option.text = currentYear + i;
        expiryYearSelect.appendChild(option);
    }
}

// Sayfa yüklendiğinde doğru formun gösterilmesi için çağrılır
document.addEventListener('DOMContentLoaded', function() {
    togglePaymentForm();
    populateExpiryYears();
    cartCalculate();
});
