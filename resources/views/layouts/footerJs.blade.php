<!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('js/vendors.min.js')}}" type="text/javascript"></script>
    {{-- <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script> --}}

    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('js/plugins.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/custom-script.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/customizer.js')}}" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('js/page-contact.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         
        $(".card-alert .close").click(function () {
            $(this)
                .closest(".card-alert")
                .fadeOut("slow");
        });
    </script>