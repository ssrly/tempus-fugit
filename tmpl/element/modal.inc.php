<div class="modal">
    <div class="modal-content">
        <?php
        /** @var $page ./../../index.php */
        if ($page === 'users' || $page === 'settings') {
            include_once './tmpl/form/user.inc.php';
        } elseif ($page === 'times') {
            include_once './tmpl/form/time.inc.php';
        } elseif ($page === 'groups') {
            include_once './tmpl/form/group.inc.php';
        } else {
            include_once './tmpl/form/login.inc.php';
        } ?>
    </div>
</div>