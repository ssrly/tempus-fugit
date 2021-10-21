<div class="modal hidden">
    <div class="modal-content">
        <?php
        /** @var $page ./../../index.php */
        switch ($page) {
            case 'users':
            case 'settings':
            case 'registration' :
                include_once './tmpl/form/user.inc.php';
                break;
            case 'times':
                include_once './tmpl/form/time.inc.php';
                break;
            default:
                include_once './tmpl/form/login.inc.php';
                break;
        } ?>
        <div class="modal-detail hidden">
            <div class="modal-header">
                <span id="modal-headline">Details</span>
                <i class="fas fa-times close"></i>
            </div>
            <div class="modal-body detail-body"></div>
        </div>
    </div>
</div>