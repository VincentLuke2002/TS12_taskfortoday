<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$initials = '';
foreach (preg_split('/\s+/', trim($user['full_name'])) as $part) {
    $initials .= strtoupper(substr($part, 0, 1));
}
?>
<section class="page-intro compact-intro"><p class="eyebrow">Team identity</p><h1>The person behind the plan.</h1></section>

<section class="profile-panel">
    <div class="profile-identity">
        <div class="avatar" aria-hidden="true"><?= esc(substr($initials, 0, 2)) ?></div>
        <div><p class="eyebrow">Demo account</p><h2><?= esc($user['full_name']) ?></h2><p class="profile-handle">@<?= esc($user['username']) ?></p></div>
    </div>
    <dl class="profile-details">
        <div><dt>Email address</dt><dd><a href="mailto:<?= esc($user['email']) ?>"><?= esc($user['email']) ?></a></dd></div>
        <div><dt>Member since</dt><dd><?= esc((new DateTimeImmutable($user['created_at']))->format('F j, Y')) ?></dd></div>
        <div><dt>Account type</dt><dd>Task coordinator</dd></div>
    </dl>
</section>
<?= $this->endSection() ?>
