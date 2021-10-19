<div class="modal">
    <div class="modal-content">
        <?php
        /** @var $page ./../../index.php */
        if ($page === 'users' || $page === 'settings') {
            include_once './tmpl/form/user.inc.php';
        } elseif ($page === 'times') {
            include_once './tmpl/form/time.inc.php';
        } else {
            include_once './tmpl/form/login.inc.php';
        } ?>
        <div class="modal-detail hidden">
            <div class="modal-header">
                <h3 id="modal-headline">Details</h3>
                <span class="close">X</span>
            </div>
            <div class="modal-body detail-body"></div>
        </div>
    </div>
</div>