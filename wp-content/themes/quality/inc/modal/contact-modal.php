<!-- Contact Modal -->
<div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Заполните форму</h4>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="689" title="Модальное окно"]'); ?>
            </div>
        </div>
    </div>
</div>

<script>
  document.addEventListener( 'wpcf7mailsent', function( event ) {
    jQuery('#contact-modal').modal('hide');
    jQuery('#send-ok-modal').modal('show'); //show confirmation modal
  }, false );
</script>