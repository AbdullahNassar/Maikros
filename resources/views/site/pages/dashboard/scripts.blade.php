@section('scripts')
<!-- Page Scripts Starts -->
<script src="{{asset('vendors/site/EN/js/jquery.min.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/custom-date-picker.js')}}"></script>
<script src="{{asset('vendors/site/EN/js/custom-navigation.js')}}"></script>
<!-- Page Scripts Ends -->
<script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>

<script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>

@if(Config::get('app.locale') == 'en')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#tables').DataTable( {
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                } );
                $('#tables2').DataTable( {
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                } );
                $('#tables3').DataTable( {
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                } );
                $('#tables4').DataTable( {
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                } );
            } );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    
            $('#hotel_approve').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.hotelApprove') }}",
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
                            toastr.info('Reservation has been confirmed successfully.', 'Success!', {timeOut: 3000});
                            $('#subscribe_form')[0].reset();                            
                        }
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    
            $('#program_approve').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.programApprove') }}",
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
                            toastr.info('Reservation has been confirmed successfully.', 'Success!', {timeOut: 3000});
                            $('#subscribe_form')[0].reset();                            
                        }
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    
            $('#service_approve').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.serviceApprove') }}",
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
                            toastr.info('Reservation has been confirmed successfully.', 'Success!', {timeOut: 3000});
                            $('#subscribe_form')[0].reset();                            
                        }
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    
            $('#flight_approve').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.flightApprove') }}",
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
                            toastr.info('Reservation has been confirmed successfully.', 'Success!', {timeOut: 3000});
                            $('#subscribe_form')[0].reset();                            
                        }
                    }
                })
            });
        });
    </script>
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#tables').DataTable( {
                  "language":{
                    "decimal":        "",
                    "emptyTable":     "لا يوجد بيانات",
                    "info": "عرض صفحة _PAGE_ من _PAGES_ صفحات",
                    "infoEmpty":      "عرض مدخلات من 0 الى 0 ",
                    "infoFiltered":   "(محدد من _MAX_ عنصر)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "عرض مدخلات القائمة",
                    "loadingRecords": "...تحميل",
                    "processing":     "...تنفيذ",
                    "search":         "ابحث:  ",
                    "zeroRecords":    "لا يوجد نتائج للبحث",
                    "paginate": {
                        "first":      "الأول",
                        "last":       "الأخير",
                        "next":       "التالى",
                        "previous":   "السابق"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                  }
                } );
                $('#tables2').DataTable( {
                  "language":{
                    "decimal":        "",
                    "emptyTable":     "لا يوجد بيانات",
                    "info": "عرض صفحة _PAGE_ من _PAGES_ صفحات",
                    "infoEmpty":      "عرض مدخلات من 0 الى 0 ",
                    "infoFiltered":   "(محدد من _MAX_ عنصر)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "عرض مدخلات القائمة",
                    "loadingRecords": "...تحميل",
                    "processing":     "...تنفيذ",
                    "search":         "ابحث:  ",
                    "zeroRecords":    "لا يوجد نتائج للبحث",
                    "paginate": {
                        "first":      "الأول",
                        "last":       "الأخير",
                        "next":       "التالى",
                        "previous":   "السابق"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                  }
                } );
                $('#tables3').DataTable( {
                  "language":{
                    "decimal":        "",
                    "emptyTable":     "لا يوجد بيانات",
                    "info": "عرض صفحة _PAGE_ من _PAGES_ صفحات",
                    "infoEmpty":      "عرض مدخلات من 0 الى 0 ",
                    "infoFiltered":   "(محدد من _MAX_ عنصر)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "عرض مدخلات القائمة",
                    "loadingRecords": "...تحميل",
                    "processing":     "...تنفيذ",
                    "search":         "ابحث:  ",
                    "zeroRecords":    "لا يوجد نتائج للبحث",
                    "paginate": {
                        "first":      "الأول",
                        "last":       "الأخير",
                        "next":       "التالى",
                        "previous":   "السابق"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                  }
                } );
                $('#tables4').DataTable( {
                  "language":{
                    "decimal":        "",
                    "emptyTable":     "لا يوجد بيانات",
                    "info": "عرض صفحة _PAGE_ من _PAGES_ صفحات",
                    "infoEmpty":      "عرض مدخلات من 0 الى 0 ",
                    "infoFiltered":   "(محدد من _MAX_ عنصر)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "عرض مدخلات القائمة",
                    "loadingRecords": "...تحميل",
                    "processing":     "...تنفيذ",
                    "search":         "ابحث:  ",
                    "zeroRecords":    "لا يوجد نتائج للبحث",
                    "paginate": {
                        "first":      "الأول",
                        "last":       "الأخير",
                        "next":       "التالى",
                        "previous":   "السابق"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                  }
                } );
            } );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#hotel_approve').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.hotelApprove') }}",
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
                            toastr.success('تم تأكيد الحجز بنجاح', 'تم!', {timeOut: 3000});
                            $('#subscribe_form')[0].reset();
                            
                        }
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#program_approve').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.programApprove') }}",
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
                            toastr.success('تم تأكيد الحجز بنجاح', 'تم!', {timeOut: 3000});
                            $('#subscribe_form')[0].reset();
                            
                        }
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#service_approve').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.serviceApprove') }}",
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
                            toastr.success('تم تأكيد الحجز بنجاح', 'تم!', {timeOut: 3000});
                            $('#subscribe_form')[0].reset();
                            
                        }
                    }
                })
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#flight_approve').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"{{ route('site.flightApprove') }}",
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
                            toastr.success('تم تأكيد الحجز بنجاح', 'تم!', {timeOut: 3000});
                            $('#subscribe_form')[0].reset();
                            
                        }
                    }
                })
            });
        });
    </script>
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
<script src="{{asset('vendors/js/jquery.nicescroll.min.js')}}"></script>
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
@endsection