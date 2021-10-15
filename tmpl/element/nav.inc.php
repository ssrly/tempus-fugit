<nav>
    <ul>
        <li class="<?= (empty($page) || $page === 'home') ? 'active' : ''; ?>">
            <a href="index.php?page=home">Home</a>
        </li>
        <li class="<?=  $page === 'users' ? 'active' : ''; ?>">
            <a href="index.php?page=users">Users</a>
            <i class="fa-solid fa-user"></i>
        </li>
        <li class="<?=  $page === 'times' ? 'active' : ''; ?>">
            <a href="index.php?page=times">Times</a>
            <i class="fa-solid fa-stopwatch"></i>
        </li>
        <li class="<?=  $page === 'groups' ? 'active' : ''; ?>">
            <a href="index.php?page=groups">Groups</a>
            <i class="fa-solid fa-user-group"></i>
        </li>
        <li class="<?=  $page === 'docu' ? 'active' : ''; ?>">
            <a href="index.php?page=docu">Docu</a>
            <i class="fa-solid fa-book"></i>
        </li>
        <li class="<?=  $page === 'impressum' ? 'active' : ''; ?>">
            <a href="index.php?page=impressum">Impressum</a>
            <i class="fa-solid fa-section"></i>
        </li>
    </ul>
</nav>