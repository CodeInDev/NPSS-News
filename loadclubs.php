<?php foreach ($clubs as $club): ?>
    <a class="content tile" href="clubhome.php?club=<?php echo $club['id'] ?>">
        <?php if (strlen($club['image']) > 0) { ?>
            <img src="data:image;base64,<?php echo $club['image'] ?>">
        <?php } else { ?>
            <img src="Mosaic Background.png">
        <?php } ?>
        <p style="text-align: left; margin: 7px 10px"><?php echo $club['name'] ?></p>
    </a>
<?php endforeach ?>
