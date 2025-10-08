<?php
$search = isset($_GET['found']) ? htmlspecialchars($_GET['found']) : '';
$data = isset($_GET['data']) ? htmlspecialchars($_GET['data']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Display the page info text -->

    <div class="page-info">
        <?php if (!isset($_GET['page_number'])): ?>
            <?php $page = 1; ?>
        <?php else: ?>
            <?php $page = $_GET['page_number']; ?>
        <?php endif; ?>
        <p>Showing <?php echo $page ?> of <?php echo $pages ?> pages</p>
    </div>

    <?php if (!empty($data)): ?>
        <!-- Display the pagination button -->
    <div class="pagination">
        <!-- Go to first page button -->
        <a href="?page_number=1&data=<?= urlencode($data) ?>">First page</a>

        <!-- Go to previous page button -->
        <?php if (isset($_GET['page_number']) && $_GET['page_number'] > 1): ?>
            <a href="?page_number=<?php echo $_GET['page_number'] - 1 ?>&data=<?= urlencode($data) ?>">Previous page</a>
        <?php else: ?>
            <a href="?page_number=1&data=<?= urlencode($data) ?>">Previous page</a>
        <?php endif; ?>

        <!-- Output the page number -->
        <?php if ($pages < 5): ?>
            <?php for ($i = 1; $i <= $pages; $i++): ?>
                <a href="?page_number=<?php echo $i ?>&data=<?= urlencode($data) ?>"><?php echo $i ?></a>
            <?php endfor; ?>
        <?php else: ?>
            <?php if ($_GET['page_number'] == 1): ?>
                <?php $endPage = 5; ?>
                <?php for ($i = 1; $i <= $endPage; $i++): ?>
                    <a href="?page_number=<?php echo $i ?>&data=<?= urlencode($data) ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            <?php elseif ($_GET['page_number'] == 2): ?>
                <?php
                $startPage = $_GET['page_number'] - 1;
                $endPage = $_GET['page_number'] + 3;
                ?>
                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <a href="?page_number=<?php echo $i ?>&data=<?= urlencode($data) ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            <?php elseif ($_GET['page_number'] == $pages): ?>
                <?php $startPage = $pages - 4; ?>
                <?php for ($i = $startPage; $i <= $pages; $i++): ?>
                    <a href="?page_number=<?php echo $i ?>&data=<?= urlencode($data) ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            <?php else: ?>
                <?php
                $startPage = $_GET['page_number'] - 2;
                $endPage = $_GET['page_number'] + 2;
                ?>
                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <a href="?page_number=<?php echo $i ?>&data=<?= urlencode($data) ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Go to next page button -->
        <?php if (isset($_GET['page_number']) && $_GET['page_number'] < $pages): ?>
            <a href="?page_number=<?php echo $_GET['page_number'] + 1 ?>&found=<?= urlencode($search) ?>&data=<?= urlencode($data) ?>">Next page</a>
        <?php else: ?>
            <a href="?page_number=<?php echo $pages ?>&found=<?= urlencode($search) ?>&data=<?= urlencode($data) ?>">Next page</a>
        <?php endif; ?>

        <!-- Go to last page button -->
        <a href="?page_number=<?php echo $pages ?>&found=<?= urlencode($search) ?>&data=<?= urlencode($data) ?>">Last page</a>
    <?php else: ?>
        <!-- Display the pagination button -->
    <div class="pagination">
        <!-- Go to first page button -->
        <a href="?page_number=1">First page</a>

        <!-- Go to previous page button -->
        <?php if (isset($_GET['page_number']) && $_GET['page_number'] > 1): ?>
            <a href="?page_number=<?php echo $_GET['page_number'] - 1 ?>">Previous page</a>
        <?php else: ?>
            <a href="?page_number=1">Previous page</a>
        <?php endif; ?>

        <!-- Output the page number -->
        <?php if ($pages < 5): ?>
            <?php for ($i = 1; $i <= $pages; $i++): ?>
                <a href="?page_number=<?php echo $i ?>"><?php echo $i ?></a>
            <?php endfor; ?>
        <?php else: ?>
            <?php if ($_GET['page_number'] == 1): ?>
                <?php $endPage = 5; ?>
                <?php for ($i = 1; $i <= $endPage; $i++): ?>
                    <a href="?page_number=<?php echo $i ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            <?php elseif ($_GET['page_number'] == 2): ?>
                <?php $endPage = $_GET['page_number'] + 3;?>
                <?php for ($i = 1; $i <= $endPage; $i++): ?>
                    <a href="?page_number=<?php echo $i ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            <?php elseif ($_GET['page_number'] == $pages): ?>
                <?php $startPage = $pages - 4; ?>
                <?php for ($i = $startPage; $i <= $pages; $i++): ?>
                    <a href="?page_number=<?php echo $i ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            <?php else: ?>
                <?php
                $startPage = $_GET['page_number'] - 2;
                $endPage = $_GET['page_number'] + 2;
                ?>
                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <a href="?page_number=<?php echo $i ?>"><?php echo $i ?></a>
                <?php endfor; ?>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Go to next page button -->
        <?php if (isset($_GET['page_number']) && $_GET['page_number'] < $pages): ?>
            <a href="?page_number=<?php echo $_GET['page_number'] + 1 ?>">Next page</a>
        <?php else: ?>
            <a href="?page_number=<?php echo $pages ?>">Next page</a>
        <?php endif; ?>

        <!-- Go to last page button -->
        <a href="?page_number=<?php echo $pages ?>">Last page</a>
    <?php endif; ?>
    
    </div>
</body>

</html>