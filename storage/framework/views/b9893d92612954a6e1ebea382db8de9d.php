<div id="flash-overlay-modal" class="modal fade <?php echo e(isset($modalClass) ? $modalClass : ''); ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title"><?php echo e($title); ?></h4>
            </div>

            <div class="modal-body">
                <p><?php echo $body; ?></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\vendor\laracasts\flash\src\views\modal.blade.php ENDPATH**/ ?>