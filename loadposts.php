<?php foreach ($posts as $post): ?>
    <div class="content" style="margin-bottom:30px">
        <span class="dropdownbutton" id="<?php echo "button" . $post['id'] ?>" onclick="toggledropdown(this)">
            <img src="Dots.png">
            <form method="post" class="dropdown" id="<?php echo "dropdown" . $post['id'] ?>">
                <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                <input type="submit" name="deletepost" class="delete" value="Delete">
            </form>
        </span>
        <a class="post-club" href="clubhome.php?club=<?php echo json_decode($post['club'], TRUE)['id'] ?>">
            <?php echo json_decode($post['club'], TRUE)['name'] ?>
        </a>
        <hr class="line">
        <p class="post-title"><?php echo $post['title'] ?></p>
        <p class="post-content"><?php echo $post['content'] ?></p>
    </div>
<?php endforeach ?>