<script src="{{ asset('frontend') }}/src/js/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/src/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/video.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/slick.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('frontend') }}/src/scss/vendors/plugin/js/jquery.star-rating-svg.js"></script>
<script src="{{ asset('frontend') }}/dist/main.js"></script>
<script src="{{ asset('frontend') }}/src/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<!-- toastr notification -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
<script>
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

    $('#a1').hide();
    $('#b2').hide();
    $('#c3').hide();
    $('#d4').hide();
    $('#e5').hide();

    $(function() {
        $("#rating").rateYo({
            fullStar: true,
            ratedFill: "#FF7A1A",
            // halfStar: true,
            onSet: function(rating, rateYoInstance) {
                $('.rating-stars').val(rating);
                switch (rating) {
                    case 1:
                        $('#a1').show();
                        $('#b2').hide();
                        $('#c3').hide();
                        $('#d4').hide();
                        $('#e5').hide();
                        break;
                    case 2:
                        $('#a1').hide();
                        $('#b2').show();
                        $('#c3').hide();
                        $('#d4').hide();
                        $('#e5').hide();
                        break;
                    case 3:
                        $('#a1').hide();
                        $('#b2').hide();
                        $('#c3').show();
                        $('#d4').hide();
                        $('#e5').hide();
                        break;
                    case 4:
                        $('#a1').hide();
                        $('#b2').hide();
                        $('#c3').hide();
                        $('#d4').show();
                        $('#e5').hide();
                        break;
                    case 5:
                        $('#a1').hide();
                        $('#b2').hide();
                        $('#c3').hide();
                        $('#d4').hide();
                        $('#e5').show();
                        break;
                    default:
                        $('#a1').hide();
                        $('#b2').hide();
                        $('#c3').hide();
                        $('#d4').hide();
                        $('#e5').hide();
                }
            }
        });
    });

    function lessonActivity(chapterslug, lessonslug) {
        $('#chapter_slug_input').val(chapterslug)
        $('#lesson_slug_input').val(lessonslug)
        $('#lesson_activity_form').submit()
    }

    $('.lessonCheck').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var lessonId = $(this).data('lessonid');
        var chapterId = $(this).data('chapterid');
        var courseId = $('#course_id').val();

        $.ajax({
            type: "POST",
            url: "{{ route('course.lesson.check') }}",
            data: {
                _token: "{{ csrf_token() }}",
                status: status,
                lesson_id: lessonId,
                chapter_id: chapterId,
                course_id: courseId,
            },
            // beforeSend: function() {
            //     $("#loading").show();
            // },
            // complete: function() {
            //     $("#loading").hide();
            // },
            success: function(response) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('course.progress') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        course_id: courseId,
                    },
                    success: function(response) {
                        $('#courseProgressHtml').html(parseFloat(response).toFixed(0));
                        $('.videolist-area-bar--progress').css('width', response + '%');
                    }
                })
            },
        })
    })
</script>
