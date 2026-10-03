<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="about-grid">
    <div class="about-title"><p class="eyebrow">About the project</p><h1>A small system with one useful promise.</h1></div>
    <div class="about-copy">
        <p class="lead">Tasks for Today keeps the immediate work in focus while preserving a complete view of the schedule.</p>
        <p>The application uses CodeIgniter 4’s MVC structure. Controllers select the right records, models provide a shared database layer, and reusable views turn that data into four distinct pages.</p>
        <p>The dashboard filters tasks using today’s date. The task list uses the same table without that filter, proving that one reliable data source can support different interfaces.</p>
        <div class="developer-signature"><span>Designed and developed by</span><strong><?= esc($developerName) ?></strong><small>Web System Technologies</small></div>
    </div>
</section>

<section class="principles">
    <article><span>01</span><h2>Focused</h2><p>Today’s page only shows work due today.</p></article>
    <article><span>02</span><h2>Shared</h2><p>Every page reads from the same models and database.</p></article>
    <article><span>03</span><h2>Clear</h2><p>Status, date, and ownership remain easy to scan.</p></article>
</section>
<?= $this->endSection() ?>
