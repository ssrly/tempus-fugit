<nav class="navigation">
    <ul>
        <li class="<?= (empty($page) || $page === 'home') ? 'active' : ''; ?>">
            <a href="index.php?page=home">
                <span class="link-name">Home</span>
                <i class="fa fa-solid fa-home"></i>
            </a>
        </li>
        <li class="<?= $page === 'times' ? 'active' : ''; ?>">
            <a href="index.php?page=times">
                <span class="link-name">Times</span>
                <i class="fa fa-solid fa-stopwatch"></i>
            </a>
        </li>
        <li class="<?= $page === 'users' ? 'active' : ''; ?>">
            <a href="index.php?page=users">
                <span class="link-name">Users</span>
                <i class="fa fa-solid fa-user"></i>
            </a>
        </li>
        <li class="<?= $page === 'docu' ? 'active' : ''; ?>">
            <a href="index.php?page=docu">
                <span class="link-name">Docu</span>
                <i class="fa fa-solid fa-book"></i>
            </a>
        </li>
        <li class="<?= $page === 'impressum' ? 'active' : ''; ?>">
            <a href="index.php?page=impressum">
                <span class="link-name">Impressum</span>
                <i class="fas fa-address-card"></i>
            </a>
        </li>
        <li class="<?= $page === 'setup' ? 'active' : ''; ?>">
            <a href="index.php?page=settings">
                <span class="link-name">Settings</span>
                <i class="fas fa-cog"></i>
            </a>
        </li>
    </ul>
</nav>