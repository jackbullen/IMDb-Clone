<?php
include 'header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<h1>Names</h1>
<form action="/" method="get">
    <input type="hidden" name="action" value="listNames">
    <input type="text" name="searchQuery" id="searchInput" placeholder="Search for names...">
    <input type="submit" value="Search">
</form>

<!-- <?php
echo "<pre>";
print_r($names);
echo "</pre>";
?> -->

<ul id="nameList">
    <?php 
    
    if (isset($names) && is_array($names)):
        foreach ($names as $name): ?>
            <li><a href="?action=nameDetails&nconst=<?php echo $name['nconst']; ?>"><?php echo $name['primaryName']; ?></a></li>
    <?php 
        endforeach;
    endif; 
    ?>
</ul>

<?php
    $newOffset = (isset($offset) ? $offset : 0) + $limit;
    $searchQuery = $_GET['searchQuery'] ?? null;
    $action = $_GET['action'] ?? 'listNames';
    echo "<a href='?action=$action&offset=$newOffset&limit=$limit&searchQuery=$searchQuery'>View More</a>";
?>

<form method="GET" action="/">
    <input type="hidden" name="action" value="listNames">
    <input type="hidden" name="searchQuery" value="<?php echo $_GET['searchQuery'] ?? ''; ?>">
    <label for="resultsPerPage">Results per page: </label>
    <select name="limit" id="resultsPerPage" onchange="this.form.submit()">
        <option value="10" <?php echo $limit == 10 ? 'selected' : ''; ?>>10</option>
        <option value="25" <?php echo $limit == 25 ? 'selected' : ''; ?>>25</option>
        <option value="50" <?php echo $limit == 50 ? 'selected' : ''; ?>>50</option>
        <option value="100" <?php echo $limit == 100 ? 'selected' : ''; ?>>100</option>
    </select>
</form>


<?php
include 'footer.php';
