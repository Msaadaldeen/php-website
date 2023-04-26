<h3 class="col-md-8 mx-auto"> Edit your Post</h3>
<div class="col-md-8 mx-auto">
    <form method="POST">
        <div class="form-group">
            <input type="hidden" name="csrfToken" value="<?php echo $csrfToken ?>">
            <label class="sr-only" for="title">post</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $post->getTitle() ?>">
            <?php if (isset($errors['title'])) : ?>
                <ul class="error"> <?= $errors['title'][0] ?> </ul>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label class="sr-only" for="body">post</label>
            <textarea class="form-control" id="body" name="body" rows="5"><?php echo $post->getBody() ?></textarea>
            <?php if (isset($errors['body'])) : ?>
                <ul class="error"> <?= $errors['body'][0] ?> </ul>
            <?php endif; ?>
        </div>
        <?php if (isset($errors['root'])) : ?>
            <ul class="error"> <?= $errors['root'] ?> </ul>
        <?php endif; ?>
        <button type="submit" class="btn btn-info">Edit</button>
    </form>
</div>