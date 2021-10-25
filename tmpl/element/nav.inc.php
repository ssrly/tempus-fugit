<?php
/** @var $page /index.php */ ?>
<ul class="nav-list">
    <li class="<?= (empty($page) || $page === 'home') ? 'active' : ''; ?>">
        <a href="index.php?page=home" class="nav-link">
            <span class="link-name">Home</span>
            <i class="fa fa-solid fa-home"></i>
        </a>
    </li>
    <?php
    if (isLoggedIn()): ?>
        <li class="<?= $page === 'times' ? 'active' : ''; ?>">
            <a href="index.php?page=times" class="nav-link">
                <span class=" link-name">Times</span>
                <i class="fa fa-solid fa-stopwatch balance-icon"></i>
            </a>
        </li>
    <?php
    endif; ?>
    <?php
    if (isLoggedIn() && isAdmin()) : ?>
        <li class="<?= $page === 'users' ? 'active' : ''; ?>">
            <a href="index.php?page=users" class="nav-link">
                <span class=" link-name">Users</span>
                <i class="fa fa-solid fa-user balance-icon"></i>
            </a>
        </li>
    <?php
    endif; ?>
    <!--    <li class="--><?
    //= $page === 'docu' ? 'active' : ''; ?><!--">-->
    <!--        <a href="index.php?page=docu" class="nav-link">-->
    <!--            <span class="link-name">Docu</span>-->
    <!--            <i class="fa fa-solid fa-book balance-icon"></i>-->
    <!--        </a>-->
    <!--    </li>-->
    <li class="<?= $page === 'impressum' ? 'active' : ''; ?>">
        <a href="index.php?page=impressum" class="nav-link">
            <span class=" link-name">Impressum</span>
            <i class="fas fa-address-card"></i>
        </a>
    </li>
    <?php
    if (isLoggedIn()): ?>
        <li class="<?= $page === 'settings' ? 'active' : ''; ?>">
            <a href="index.php?page=settings" class="nav-link">
                <span class=" link-name">Settings</span>
                <i class="fas fa-cog balance-icon"></i>
            </a>
        </li>
    <?php
    endif; ?>
</ul>