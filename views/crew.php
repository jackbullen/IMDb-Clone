<?php
include 'header.php';
?>
<h1><?php echo $crew[0]['primaryName']; ?></h1>
<p><strong>Name:</strong> <?php echo $crew[0]['nconst']; ?></p>
<p><strong>Birth:</strong> <?php echo $crew[0]['birthYear']; ?></p>
<h2>Roles:</h2>
<ul>
    <?php foreach ($crew as $detail): ?>
        <li>
            <!-- <p>Rating: <?php echo $detail['rating']; ?></p>
            <p>Review: <?php echo $detail['review']; ?></p> -->
        </li>
    <?php endforeach; ?>
</ul>
<h2>Known for:</h2>
<ul>
    <?php foreach ($crew as $detail): ?>
        <li>
            <p>Rating: <?php echo $detail['rating']; ?></p>
            <p>Review: <?php echo $detail['review']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<?php
include 'footer.php';
