<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if($records->onFirstPage()): ?>
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
        <?php else: ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo e($records->previousPageUrl()); ?>" rel="prev">&laquo;</a>
            </li>
        <?php endif; ?>

        <?php for($i = max(1, $records->currentPage() - 2); $i <= min($records->lastPage(), $records->currentPage() + 2); $i++): ?>
            <li class="page-item <?php echo e($i == $records->currentPage() ? 'active' : ''); ?>">
                <a class="page-link" href="<?php echo e($records->url($i)); ?>"><?php echo e($i); ?></a>
            </li>
        <?php endfor; ?>

        <?php if($records->hasMorePages()): ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo e($records->nextPageUrl()); ?>" rel="next">&raquo;</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/layouts/components/pagination.blade.php ENDPATH**/ ?>