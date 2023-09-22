<?php include 'header.php'; ?>

<div class="container">
    <h1><?php echo $nameDetails['primaryName']; ?></h1>
    <?php if(isset($nameDetails)): ?>
        <div class="name-details">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($nameDetails['primaryName']); ?></p>
            <?php if(isset($nameDetails['birthYear'])): ?>
                <p><strong>Birth Year:</strong> <?php echo htmlspecialchars($nameDetails['birthYear']); ?></p>
            <?php endif; ?>
            <?php if(isset($nameDetails['deathYear'])): ?>
                <p><strong>Death Year:</strong> <?php echo htmlspecialchars($nameDetails['deathYear']); ?></p>
            <?php endif; ?>
            <?php if(isset($nameDetails['primaryProfession'])): ?>
                <p><strong>Roles:</strong> <?php echo htmlspecialchars($nameDetails['primaryProfession']); ?></p>
            <?php endif; ?>
            <?php if(isset($nameDetails['knownForTitles'])): ?>
                <p><strong>Known for:</strong> <?php echo htmlspecialchars($nameDetails['knownForTitles']); ?></p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p>No details available for this name.</p>
    <?php endif; ?>
</div>
<?php include 'footer.php'; ?>