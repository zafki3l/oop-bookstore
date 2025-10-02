<!-- Tabs -->
<div class="tabs" role="tablist" aria-label="Order filters">
    <div class="tab active" role="tab" aria-selected="true">
        <span class="key">
            <?= $all ?>
        </span>
        <a href="all.myorder.php">All orders</a>
    </div>
    <div class="tab" role="tab">
        <span class="key">
            <?= $pending ?>
        </span>
        <a href="pending.myorder.php">Pending</a>
    </div>
    <div class="tab" role="tab">
        <span class="key">
            <?= $beingDelivered ?>
        </span>
        <a href="beingDelivered.myorder.php">Being Delivered</a>
    </div>
    <div class="tab" role="tab">
        <span class="key">
            <?= $completed ?>
        </span>
        <a href="completed.myorder.php">Completed</a>
    </div>
</div>