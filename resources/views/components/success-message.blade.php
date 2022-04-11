@if(session()->has('success'))
    <div class="toast align-items-center text-white bg-primary border-0 position-absolute bottom-0 end-0 p-9" id="success-toast" role="alert"
         aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <strong class="mr-auto">{{session()->get('success')}}</strong>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close">
            </button>
        </div>
    </div>

    <script>
        let option = {
            animation: true,
            delay: 2000
        };

        let toastHTMLElement = document.getElementById("success-toast");

        let toastElement = new bootstrap.Toast(toastHTMLElement, option);

        toastElement.show();
    </script>
@endif
