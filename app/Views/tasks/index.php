<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-intro">
    <p class="eyebrow">Complete archive</p>
    <div class="intro-row">
        <h1>Every task,<br>in sequence.</h1>
        <p><?= esc((string) $total) ?> tasks across <?= esc((string) count($groups)) ?> dates, ordered from earliest to latest so the full workload stays visible.</p>
    </div>
</section>

<section class="timeline" aria-label="All tasks grouped by date">
    <?php foreach ($groups as $taskDate => $tasks): ?>
        <?php $date = new DateTimeImmutable($taskDate); ?>
        <div class="timeline-group">
            <div class="timeline-date"><span><?= esc($date->format('D')) ?></span><strong><?= esc($date->format('d')) ?></strong><small><?= esc($date->format('M Y')) ?></small></div>
            <div class="timeline-items">
                <?php foreach ($tasks as $task): ?>
                    <?php $isCompleted = $task['status'] === 'completed'; ?>
                    <article class="timeline-task <?= $isCompleted ? 'is-completed' : '' ?>">
                        <div class="timeline-task-main">
                            <form class="task-check-form" method="post" action="<?= site_url('tasks/' . $task['id'] . '/toggle') ?>">
                                <?= csrf_field() ?>
                                <input type="hidden" name="return_to" value="tasks">
                                <button class="task-check <?= $isCompleted ? 'is-checked' : '' ?>" type="submit" aria-label="<?= $isCompleted ? 'Reopen' : 'Complete' ?> <?= esc($task['title']) ?>" aria-pressed="<?= $isCompleted ? 'true' : 'false' ?>">
                                    <span class="sr-only"><?= $isCompleted ? 'Completed' : 'Not completed' ?></span>
                                </button>
                            </form>
                            <div><h2><?= esc($task['title']) ?></h2><p>Task #<?= esc(str_pad((string) $task['id'], 3, '0', STR_PAD_LEFT)) ?></p></div>
                        </div>
                        <span class="status status-<?= esc(str_replace('_', '-', $task['status'])) ?>"><?= esc(ucwords(str_replace('_', ' ', $task['status']))) ?></span>
                    </article>
                <?php endforeach ?>
            </div>
        </div>
    <?php endforeach ?>
</section>
<?= $this->endSection() ?>
