<?php
include 'header.php';
?>
<h1>Movies</h1>
<form action="list_movies.php" method="get">
    <input type="text" name="searchQuery" id="searchInput" placeholder="Search for movies...">
    <input type="submit" value="Search">
</form>
<!-- <?php
echo "<pre>";
print_r($movies);
echo "</pre>";
?> -->
<ul id="movieList">
    <?php 
    if (isset($movies) && is_array($movies)):
        foreach ($movies as $movie): ?>
            <li><a href="crew.php?tconst=<?php echo $movie['nconst']; ?>"><?php echo $movie['primaryName']; ?></a></li>
    <?php 
        endforeach;
    endif; 
    ?>
</ul>
<?php
include 'footer.php';
