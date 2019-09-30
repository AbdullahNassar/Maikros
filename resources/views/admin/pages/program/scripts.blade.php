@section('scripts')
    <script src="{{asset('vendors/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('vendors/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('vendors/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('vendors/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('vendors/lib/moment/moment.js')}}"></script>
    <script src="{{asset('vendors/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('vendors/lib/jquery-switchbutton/jquery.switchButton.js')}}"></script>
    <script src="{{asset('vendors/lib/peity/jquery.peity.js')}}"></script>
    <script src="{{asset('vendors/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('vendors/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendors/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('vendors/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('vendors/lib/jt.timepicker/jquery.timepicker.js')}}"></script>
    <script src="{{asset('vendors/lib/spectrum/spectrum.js')}}"></script>
    <script src="{{asset('vendors/lib/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('vendors/lib/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('vendors/lib/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('vendors/js/bootstrap-toggle.min.js')}}"></script>
    <script src="{{asset('vendors/js/dropzone.js')}}"></script>
    <script src="{{asset('vendors/js/bracket.js')}}"></script>
    <script src="{{asset('vendors/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('vendors/js/float-labels.js')}}"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
    <script type="text/javascript">
        /* Nice Scroll */
        $(document).ready(function() {
            "use strict";
            $("html").niceScroll({
                scrollspeed: 60,
                mousescrollstep: 35,
                cursorwidth: 5,
                cursorcolor: '#0f89d1',
                cursorborder: 'none',
                background: 'rgba(15, 137, 209, 0.37)',
                cursorborderradius: 3,
                autohidemode: false,
                cursoropacitymin: 0.1,
                cursoropacitymax: 1,
                zindex: "999",
                horizrailenabled: false
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        var t = $('#program_table').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('ajaxdata.getprogramdata') }}",
                "columns":[
                    { "data": "id" , orderable:true},
                    { "data": "p_name_en" , orderable:false},
                    { "data": "price" , orderable:false},
                    { "data": "action", orderable:false, searchable: false},
                    { "data":"checkbox", orderable:false, searchable:false}
                ],
                "language": {
                    "searchPlaceholder": "Search...",
                    "sSearch": "",
                    "lengthMenu": "show _MENU_ items",
                },
                "order": [[ 0, 'asc' ]]
            });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                });
            }).draw();
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            
            $('.form-layout .form-control').on('focusin', function(){
                $(this).closest('.form-group').addClass('form-group-active');
            });
    
            $('.form-layout .form-control').on('focusout', function(){
                $(this).closest('.form-group').removeClass('form-group-active');
            });

            // Select2
            $('.select2').select2({ dropdownParent: $('#programModal') });
    
            // Input Masks
            $('#dateMask').mask('99/99/9999');
    
            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });
    
            $('#datepickerNoOfMonths').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                numberOfMonths: 2
            });
    
            // Time Picker
            $('#tpBasic').timepicker();

            $('#add_data').click(function(){
                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                $('#programModal').modal('show');
                $('#program_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
                $('.modal-title').text('Add Data');
                $('#imgInp').val($(this).data('imgInp'));
                $('#hotel').empty();
                $('#hotel').append('<option>             </option>');
                $('#service').empty();
                $('#service').append('<option>             </option>');
                $('#flight').empty();
                $('#flight').append('<option>             </option>');
                $.ajax({
                    url:"{{route('ajaxdata.hotel')}}",
                    method:'get',
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, hotelObj){
                            $('#hotel').append('<option value="'+hotelObj.id+'">'+hotelObj.hotel_name_en+'</option>')
                        });
                    }
                });
                $.ajax({
                    url:"{{route('ajaxdata.flight')}}",
                    method:'get',
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, flightObj){
                            $('#flight').append('<option value="'+flightObj.id+'">'+flightObj.flight_name_en+'</option>')
                        });
                    }
                });
                $.ajax({
                    url:"{{route('ajaxdata.service')}}",
                    method:'get',
                    dataType:'json',
                    success:function(data)
                    {
                        $.each(data, function(index, serviceObj){
                            $('#service').append('<option value="'+serviceObj.id+'">'+serviceObj.name_en+'</option>')
                        });
                    }
                });
            });
        
            $('#program_form').on('submit', function(event){
                event.preventDefault();
                //var form_data = $(this).serialize();
                var action = $('#button_action').val();
                $.ajax({
                    url:"{{ route('ajaxdata.postprogramdata') }}",
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
                            if (action == 'insert') {
                                toastr.success('Data inserted successfully.', 'Success!', {timeOut: 3000});
                                $('#program_form')[0].reset();
                                $('#action').val('Add');
                                $('.modal-title').text('Add Data');
                                $('#button_action').val('insert');
                                $('#active').attr('checked', 'checked');
                                $('#program_table').DataTable().ajax.reload();
                                $('#blah').attr('src', '../vendors/site/AR/images/hotel-detail-tab-5.jpg');
                                $('#blah2').attr('src', '../vendors/site/AR/images/hotel-detail-tab-5.jpg');
                                $('.pmd-textfield').removeClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                            }
                            if (action == 'update') {
                                toastr.success('Data updated successfully.', 'Success!', {timeOut: 3000});
                                $('#program_table').DataTable().ajax.reload();
                            }
                            
                        }
                    }
                })
            });
        
            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $('#form_output').html('');

                $.ajax({
                    url:"{{route('ajaxdata.fetchprogramdata')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    cache: false,
                    success:function(data)
                    {
                        $('.pmd-textfield').addClass("pmd-textfield-floating-label-active pmd-textfield-floating-label-completed");
                        $('#imgInp').val($(this).data('imgInp'));
                        $('#p_name_en').val(data.p_name_en);
                        $('#p_name_ar').val(data.p_name_ar);
                        $('#sub_name_ar').val(data.sub_name_ar);
                        $('#sub_name_en').val(data.sub_name_en);
                        $('#mekkah_ar').val(data.mekkah_ar);
                        $('#mekkah_en').val(data.mekkah_en);
                        $('#madenah_ar').val(data.madenah_ar);
                        $('#madenah_en').val(data.madenah_en);
                        $('#jeddah_ar').val(data.jeddah_ar);
                        $('#jeddah_en').val(data.jeddah_en);
                        $('#hotel_ar').val(data.hotel_ar);
                        $('#hotel_en').val(data.hotel_en);
                        $('#flight_ar').val(data.flight_ar);
                        $('#flight_en').val(data.flight_en);
                        $('#service_ar').val(data.service_ar);
                        $('#service_en').val(data.service_en);
                        $('#price').val(data.price);
                        $('#code').val(data.code);
                        $('#rate').val(data.rate);
                        $('#active').val(data.active);
                        $('#program_id').val(id);
                        if(data.active == 1){
                            $('#active').attr('checked', 'checked');
                        }
                        if(data.active == 0){
                            $('#active').removeAttr('checked');
                        }
                        //--------------------
                        if(data.max == 1){
                            $('#max').attr('checked', 'checked');
                        }
                        if(data.max == 0){
                            $('#max').removeAttr('checked');
                        }
                        //--------------------
                        if(data.image != null){
                            $('#blah').attr('src', '../storage/uploads/program/'+data.image+'');
                        }else{
                            $('#blah').attr('src', '../vendors/site/AR/images/hotel-detail-tab-5.jpg');
                        }
                        $('#hotel').empty();
                        $('#service').empty();
                        $('#flight').empty();
                        $.ajax({
                            url:"{{route('ajaxdata.programHotels')}}",
                            method:'get',
                            data:{id:id},
                            dataType:'json',
                            success:function(data)
                            {
                                $.each(data, function(index, hotelsObj){
                                    $('#hotel').append('<option selected value="'+hotelsObj.id+'">'+hotelsObj.hotel_name_en+'</option>')
                                });
                            }
                        });
                        $.ajax({
                            url:"{{route('ajaxdata.programFlights')}}",
                            method:'get',
                            data:{id:id},
                            dataType:'json',
                            success:function(data)
                            {
                                $.each(data, function(index, flightsObj){
                                    $('#flight').append('<option selected value="'+flightsObj.id+'">'+flightsObj.flight_name_en+'</option>')
                                });
                            }
                        });
                        $.ajax({
                            url:"{{route('ajaxdata.programServices')}}",
                            method:'get',
                            data:{id:id},
                            dataType:'json',
                            success:function(data)
                            {
                                $.each(data, function(index, servicesObj){
                                    $('#service').append('<option selected value="'+servicesObj.id+'">'+servicesObj.name_en+'</option>')
                                });
                            }
                        });
                        $.ajax({
                            url:"{{route('ajaxdata.hotel')}}",
                            method:'get',
                            dataType:'json',
                            success:function(data)
                            {
                                $.each(data, function(index, hotelObj){
                                    $('#hotel').append('<option value="'+hotelObj.id+'">'+hotelObj.hotel_name_en+'</option>')
                                });
                            }
                        });
                        $.ajax({
                            url:"{{route('ajaxdata.flight')}}",
                            method:'get',
                            dataType:'json',
                            success:function(data)
                            {
                                $.each(data, function(index, flightObj){
                                    $('#flight').append('<option value="'+flightObj.id+'">'+flightObj.flight_name_en+'</option>')
                                });
                            }
                        });
                        $.ajax({
                            url:"{{route('ajaxdata.service')}}",
                            method:'get',
                            dataType:'json',
                            success:function(data)
                            {
                                $.each(data, function(index, serviceObj){
                                    $('#service').append('<option value="'+serviceObj.id+'">'+serviceObj.name_en+'</option>')
                                });
                            }
                        });

                        $('#action').val('Edit');
                        $('.modal-title').text('Edit Data');
                        $('#button_action').val('update');
                        $('#programModal').modal('show');
                    }
                });
            });

            $(document).on('click', '.view', function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '{{route('ajaxdata.fetchprogramdata')}}',
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    cache: false,
                    success: function (data) {
                        $('#dataModal').modal('show');
                        $('#program-name').text('Name:  '+data.p_name_en+'');
                        $('#program-image').attr('src', '../storage/uploads/program/'+data.image+'');
                        $('#program-rate').text(''+data.rate+'');
                        $('#program-price').text(''+data.price+'');
                    }
                });
            });

            var delete_id = 0;
            
            $(document).on('click', '.btndelet', function(){
                delete_id = $(this).attr("id");
                $('#delete-modal').modal('show');
            });
        
            $(document).on('click', '.btndelete', function(){
                
                console.log(delete_id);
                $.ajax({
                    url:"{{route('ajaxdata.removeprogramdata')}}",
                    mehtod:"get",
                    data:{id:delete_id},
                    success:function(data)
                    {
                        $('#program_table').DataTable().ajax.reload();
                    }
                })
                $('#delete-modal').modal('hide');
            });

            $(document).on('click', '#bulk_delete', function(){
                var id = [];
                $('.program_checkbox:checked').each(function(){
                    id.push($(this).val());
                });
                if(id.length > 0){
                    $('#multi_delete-modal').modal('show');
                }else{
                    $('#error-modal').modal('show');
                }
            });

            $(document).on('click', '.multideletebtn', function(){
                var id = [];
                $('.program_checkbox:checked').each(function(){
                    id.push($(this).val());
                });
                if(id.length > 0){
                    $.ajax({
                        url:"{{ route('ajaxdata.programmassremove')}}",
                        method:"get",
                        data:{id:id},
                        success:function(data){
                            $('#program_table').DataTable().ajax.reload();
                        }
                    });
                    $('#multi_delete-modal').modal('hide');
                }
            });
        });
    </script>
@endsection