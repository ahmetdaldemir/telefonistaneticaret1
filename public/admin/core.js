     function handleAlert (message) {
    const toastHTML = `<div class="toast fade">
        <div class="alert p-4 relative flex bg-emerald-50 dark:bg-emerald-500 text-emerald-500 dark:text-emerald-50 font-semibold justify-between items-center">
            <div class="flex items-center">
                <span class="text-2xl text-emerald-400 dark:text-emerald-50">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <div class="ltr:ml-2 rtl:mr-2">`+message+`</div>
            </div>
            <button class="close-btn" data-bs-dismiss="toast">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>`
    $('#notification-toast-alert').append(toastHTML)
    $('#notification-toast-alert .toast:last-child').toast('show');
    setTimeout(function(){
        $('#notification-toast-alert .toast:first-child').remove();
    }, 5000);
}

