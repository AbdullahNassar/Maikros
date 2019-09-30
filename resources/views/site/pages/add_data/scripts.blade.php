@section('scripts')
<!-- Page Scripts Starts -->
<script src="{{asset('vendors/site/EN/js/jquery.min.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/custom-date-picker.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/custom-navigation.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/slick.min.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/dropzone.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/select2.min.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/custom-upload.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/jquery-ui.min.js')}}"></script>
<!-- Page Scripts Ends -->
<script src="{{asset('vendors/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    /* Nice Scroll */
    $(document).ready(function() {

        "use strict";

        $("html").niceScroll({
            scrollspeed: 60,
            mousescrollstep: 35,
            cursorwidth: 5,
            cursorcolor: '#faa61a',
            cursorborder: 'none',
            background: '#faa61a59',
            cursorborderradius: 3,
            autohidemode: false,
            cursoropacitymin: 0.1,
            cursoropacitymax: 1,
            zindex: "999",
            horizrailenabled: false
        });

    });
</script>
@if(Config::get('app.locale') == 'en')
<script type="text/javascript">
    $(document).ready(function() {
        $('#add_data').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.postGuest') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:"json",
                    cache: false,
                    contentType : false,
                    processData: false,
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                toastr.error(data.error[count], 'Error!', {timeOut: 3000});
                            }
                        }
                        else
                        {
                            toastr.success('Hotel is inserted successfully', 'Success!', {timeOut: 3000});
                            $('#add_data')[0].reset();
                            
                        }
                    }
                })
            });
    });
</script>
@elseif(Config::get('app.locale') == 'ar')
<script type="text/javascript">
    $(document).ready(function() {
        $('#add_data').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.postGuest') }}",
                    method:"POST",
                    data:new FormData(this),
                    dataType:"json",
                    cache: false,
                    contentType : false,
                    processData: false,
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                toastr.error(data.error[count], 'خطأ!', {timeOut: 3000});
                            }
                        }
                        else
                        {
                            toastr.success('تم اضافة البيانات بنجاح', 'تم!', {timeOut: 3000});
                            $('#add_data')[0].reset();
                            
                        }
                    }
                })
            });
    });
</script>
@endif
@if(Config::get('app.locale') == 'en')
<script type="text/javascript">
    $(document).ready(function() {

        $('#subscribe_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('site.subscribe') }}",
                method:"POST",
                data:new FormData(this),
                dataType:"json",
                cache: false,
                contentType : false,
                processData: false,
                success:function(data)
                {
                    if(data.error.length > 0)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            toastr.error(data.error[count], 'Error!', {timeOut: 3000});
                        }
                    }
                    else
                    {
                        toastr.info('Your subscribtion is done successfully.', 'Success!', {timeOut: 3000});
                        $('#subscribe_form')[0].reset();                            
                    }
                }
            })
        });
    });
</script>
@elseif(Config::get('app.locale') == 'ar')
<script type="text/javascript">
    $(document).ready(function() {

        $('#subscribe_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('site.subscribe') }}",
                method:"POST",
                data:new FormData(this),
                dataType:"json",
                cache: false,
                contentType : false,
                processData: false,
                success:function(data)
                {
                    if(data.error.length > 0)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            toastr.error(data.error[count], 'خطأ!', {timeOut: 3000});
                        }
                    }
                    else
                    {
                        toastr.success('تم الاشتراك بنجاح', 'تم!', {timeOut: 3000});
                        $('#subscribe_form')[0].reset();
                        
                    }
                }
            })
        });
    });
</script>
@endif
@endsection