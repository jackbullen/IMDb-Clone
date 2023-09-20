<?php
include 'header.php';
?>
<h1><?php echo $movieDetails[0]['primaryTitle']; ?></h1>
<p><strong>Original Title:</strong> <?php echo $movieDetails[0]['originalTitle']; ?></p>
<p><strong>Year:</strong> <?php echo $movieDetails[0]['startYear']; ?></p>
<h2>Reviews:</h2>
<ul>
    <?php foreach ($movieDetails as $detail): ?>
        <li>
            <p>Rating: <?php echo $detail['rating']; ?></p>
            <p>Review: <?php echo $detail['review']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Add a Review:</h2>
<form action="add_review.php" method="post">
    <input type="hidden" name="tconst" value="<?php echo $tconst; ?>">
    <label for="review">Review:</label>
    <textarea name="review" required></textarea>
    <label for="rating">Rating:</label>
    <select name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <button type="submit">Submit</button>
</form>
<?php
include 'footer.php';
