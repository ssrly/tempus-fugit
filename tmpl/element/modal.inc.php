<div class="modal">
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
                <h3 id="modal-headline">Details</h3>
                <span class="close">X</span>
            </div>
            <div class="modal-body detail-body"></div>
        </div>
    </div>
</div>