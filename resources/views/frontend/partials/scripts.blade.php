<script src="{{ asset('frontend') }}/src/js/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/src/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/src/js/rater.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/slick.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/jquery.nice-select.min.js"></script>
@yield('script_course_page')
<script src="{{ asset('frontend') }}/src/js/app.js"></script>
<script src="{{ asset('frontend') }}/src/js/main.js"></script>

<!-- toastr notification -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    function drop() {
        const dropBox = document.querySelector(".categoryDrop");
        const arrow = document.querySelector('.select-button button svg');
        arrow.classList.toggle("appear");
        dropBox.classList.toggle("appear");
    }


    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}", 'Success!')
    @elseif(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}", 'Warning!')
    @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}", 'Error!')
    @endif
    // toast config
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "hideMethod": "fadeOut"
    }

    // Options
    var options = {
        max_value: 5,
        step_size: 0.5,
        initial_value: 0,
        selected_symbol_type: 'utf8_star', // Must be a key from symbols
        cursor: 'default',
        readonly: true,
        change_once: false, // Determines if the rating can only be set once
        // ajax_method: 'POST',
        // url: 'http://localhost/test.php',
        additional_data: {} // Additional data to send to the server
    }

    $(".data-rating").rate(options);

</script>
