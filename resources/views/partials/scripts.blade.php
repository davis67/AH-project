<script src="{{  asset('/js/app.js')}}" type="text/javascript"></script> 
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('#material-tabs').each(function() {

            var $active, $content, $links = $(this).find('a');

            $active = $($links[0]);
            $active.addClass('active');

            $content = $($active[0].hash);

            $links.not($active).each(function() {
                    $(this.hash).hide();
            });

            $(this).on('click', 'a', function(e) {

                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault();
            });
    });
  
    $('.select_multiple').select2();

});
</script>
<!-- add JavaScript here -->
@stack("scripts")