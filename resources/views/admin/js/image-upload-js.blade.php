<script>
    $(document).ready(function(){

        //todo:image preview
        $(document).on('change','#image', function() {
            $('.error_success_msg_container').html('');
            if (this.files && this.files[0]) {
                let img = document.querySelector('.image_preview');
                img.onload = () =>{
                    URL.revokeObjectURL(img.src);
                }
                img.src = URL.createObjectURL(this.files[0]);
                document.querySelector(".image_preview").files = this.files;
            }
        });
        $(document).on('submit','#insertproker',function(e){
            e.preventDefault();
            let form_data = new FormData(this);
            $.ajax({
                url:"{{ url('admin/insertproker') }}",
                method:'post',
                data:form_data,
                cache:false,
                contentType: false,
                processData: false,
                success:function(res){
                    $('.error_success_msg_container').html('');
                    $('.image_preview').hide();
                    if(res.status=='success'){
                        window.location = "/admin/prokerposyandu/"
                        Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Ditambahkan!',
                    });
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $('.error_success_msg_container').html('');
                    $.each(error.errors, function (index, value) {
                        $('.error_success_msg_container').append('<p class="text-danger">'+value+'<p>');
                    });
                }
            });
        });
        $(document).on('submit','#editproker',function(e){
            e.preventDefault();

            let id = $("#id").val();
            let form_data = new FormData(this);
            $.ajax({
                url:`{{url('admin/updateproker')}}/${id}`,
                method:'post',
                data:form_data,
                cache:false,
                contentType: false,
                processData: false,
                success:function(res){
                    $('.error_success_msg_container').html('');
                    $('.image_preview').hide();
                    if(res.status=='success'){
                        window.location = "/admin/prokerposyandu/"
                        Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diperbarui!',
                    });
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $('.error_success_msg_container').html('');
                    $.each(error.errors, function (index, value) {
                        $('.error_success_msg_container').append('<p class="text-danger">'+value+'<p>');
                    });
                }
            });
        });

        $(document).on('submit','#insertkegiatan',function(e){
            e.preventDefault();

            let id = $("#id").val();
            let form_data = new FormData(this);
            $.ajax({
                url:`{{url('admin/insertkegiatan')}}`,
                method:'post',
                data:form_data,
                cache:false,
                contentType: false,
                processData: false,
                success:function(res){
                    $('.error_success_msg_container').html('');
                    $('.image_preview').hide();
                    if(res.status=='success'){
                        window.location = "/admin/kegiatankader/"
                        Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Ditambahkan!',
                    });
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $('.error_success_msg_container').html('');
                    $.each(error.errors, function (index, value) {
                        $('.error_success_msg_container').append('<p class="text-danger">'+value+'<p>');
                    });
                }
            });
        });

        $(document).on('submit','#updatekegiatan',function(e){
            e.preventDefault();

            let id = $("#id").val();
            let form_data = new FormData(this);
            $.ajax({
                url:`{{url('admin/updatekegiatan')}}/${id}`,
                method:'post',
                data:form_data,
                cache:false,
                contentType: false,
                processData: false,
                success:function(res){
                    $('.error_success_msg_container').html('');
                    $('.image_preview').hide();
                    if(res.status=='success'){
                        window.location = "/admin/prokerposyandu/"
                        Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data Berhasil Diperbarui!',
                    });
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $('.error_success_msg_container').html('');
                    $.each(error.errors, function (index, value) {
                        $('.error_success_msg_container').append('<p class="text-danger">'+value+'<p>');
                    });
                }
            });
        });
    });
</script>
