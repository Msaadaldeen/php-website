<div class="greeting">

</div>

<nav class="navbar navbar-light bg-white">
    <div>
        <h5 class="h5">Welcome, <?= $user->getFirstName() ?> <i class="fa fa-smile-o"></i></h5>
    </div>
    <form class="form-inline">
        <div class="input-group">
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="button-addon2">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</nav>


<div class="container-fluid gedf-wrapper">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="h5"><?= $user->getUserName() ?></div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="/profile"><i class="h6 fa fa-user"></i> My Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 gedf-main">

            <div class="card gedf-card">
                <form method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Create Post</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <input type="hidden" name="csrfToken" value="<?php echo $csrfToken ?>">
                                <div class="form-group">
                                    <label class="sr-only" for="title">post</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                    <?php if (isset($errors['title'])) : ?>
                                        <ul class="error"> <?= $errors['title'][0] ?> </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="body">post</label>
                                    <textarea class="form-control" id="body" name="body" rows="5" placeholder="What are you thinking?"></textarea>
                                    <?php if (isset($errors['body'])) : ?>
                                        <ul class="error"> <?= $errors['body'][0] ?> </ul>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="image">Upload image</label>
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <?php if (isset($errors['image'])) : ?>
                                            <ul class="error"> <?= $errors['image'][0] ?> </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($errors['root'])) : ?>
                            <ul class="error"> <?= $errors['root'] ?> </ul>
                        <?php endif; ?>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-info">share</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <?php foreach (array_reverse($user->getPosts()) as $post) : ?>
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0"><?= $user->getUserName() ?></div>
                                    <div class="h7 text-muted"><?= $user->getFullName() ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i><?php echo $post->getPostedAt() ?></div>
                        <a class="card-link" href="/post/<?php echo $post->getId() ?>/<?php echo $post->getSlug() ?>">
                            <h5 class="card-title">
                                <?php echo $post->getTitle(); ?>
                            </h5>
                        </a>

                        <p class="card-text">
                            <?php if (strlen($post->getBody()) > 150) : ?>
                                <?php echo substr($post->getBody(), 0, 150) ?>
                                <a href="/post/<?php echo $post->getId() ?>/<?php echo $post->getSlug() ?>">Read More</a>
                            <?php else : ?>
                                <?php echo $post->getBody() ?>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <?php if ($user->isLoggedIn()) : ?>
                                <?php if ($post->isLikedBy($user->getId())) : ?>
                                    <a href="/post/dislike/<?php echo $post->getId() ?>?csrfToken=<?php echo $csrfToken ?>" class="card-link"><i class="fa  fa-heart"></i> Unlike</a>
                                <?php else : ?>
                                    <a href="/post/like/<?php echo $post->getId() ?>?csrfToken=<?php echo $csrfToken ?>" class="card-link"><i class="fa  fa-heart-o"></i> Like</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="/post/<?php echo $post->getId() ?>/<?php echo $post->getSlug() ?>" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        </div>
                        <div>
                            <?php if ($user->isLoggedIn() && $user->getId() === $post->getUserId()) : ?>
                                <a href="/post/edit/<?php echo $post->getId() ?>" class="card-link"><i class="fa fa-edit"></i> Edit</a>
                                <a href="/post/delete/<?php echo $post->getId() ?>?csrfToken=<?php echo $csrfToken ?>" class="card-link"><i class="fa fa-trash"></i> Delete</a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="col-md-3">
            <div class="card gedf-card">
                <div class="card-body">

                    <h5 class="card-title"><i class="fa fa-2xs fa-group"></i> My Groups</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#"><i class="h6 text-muted"></i> Media Tech</a></li>
                    </ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#"><i class="h6 text-muted"></i> Germany Tech</a></li>
                    </ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#"><i class="h6 text-muted"></i> Repair everything</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>