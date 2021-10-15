<nav>
    <ul>
        <li class="<?= (empty($page) || $page === 'home') ? 'active' : ''; ?>">
            <a href="index.php?page=home">Home</a>
        </li>
        <li class="<?=  $page === 'users' ? 'active' : ''; ?>">
            <a href="index.php?page=users">Users</a>
        </li>
        <li class="<?=  $page === 'times' ? 'active' : ''; ?>">
            <a href="index.php?page=times">Times</a>
        </li>
        <li class="<?=  $page === 'roles' ? 'active' : ''; ?>">
            <a href="index.php?page=roles">Roles</a>
        </li>
        <li class="<?=  $page === 'docu' ? 'active' : ''; ?>">
            <a href="index.php?page=docu">Dokumentation</a>
        </li>
        <li class="<?=  $page === 'impressum' ? 'active' : ''; ?>">
            <a href="index.php?page=impressum">Impressum</a>
        </li>
    </ul>
</nav>