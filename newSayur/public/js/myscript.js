<script src="/js/app.js"></script>
<script>
    $(function(){
        
        $('.ubah')on('click',function(e){
            
            var $id = $(this).data('id');

        $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

            $.ajax({
                url: 'admin/user/edit',
                data: {id : id},
                method: 'post',
                success: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>