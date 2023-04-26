<div class="white-space">

</div>

<div class="card gedf-card col-md-8 mx-auto">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between align-items-center">
                <div class="mr-2">
                    <img class="rounded-circle" width="60" src="https://picsum.photos/150/150" alt="">
                </div>
                <div class="ml-2">
                    <div class="h5 m-0">
                        <h3><?php echo $post->getTitle() ?></h3>
                    </div>
                    <div class="h5">
                        <p><?php echo $post->getBody() ?> </p>
                    </div>
                    <div class="h5">
                        <?php foreach ($post->getImages() as $image) : ?>
                            <img class="w-50" src="<?php echo $image ?>" alt="">
                        <?php endforeach; ?>
                    </div>

                    <div class="h7 text-muted">Posted by: <?php echo $post->getUser()->getUsername() ?></div>
                    <div class="h7 text-muted">Posted at: <?php echo $post->getPostedAt() ?></div>
                    <div class="h7 text-muted">likes: <?php echo $post->getTotalLikes() ?></div>
                    <div class="h7 text-muted">comments: <?php echo $post->getCommentsCount() ?></div>

                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <?php if ($user->isLoggedIn()) : ?>
                                <?php if ($post->isLikedBy($user->getId())) : ?>
                                    <a href="/post/dislike/<?php echo $post->getId() ?>?csrfToken=<?php echo $csrfToken ?>" class="card-link"><i class="fa  fa-heart"></i> Unlike</a>
                                <?php else : ?>
                                    <a href="/post/like/<?php echo $post->getId() ?>?csrfToken=<?php echo $csrfToken ?>" class="card-link"><i class="fa  fa-heart-o"></i> Like</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="#" class="card-link"><i class="fa fa-comment-o"></i> Comment</a>
                        </div>
                        <div>
                            <?php if ($user->isLoggedIn() && $user->getId() === $post->getUserId()) : ?>
                                <a href="/post/edit/<?php echo $post->getId() ?>" class="card-link"><i class="fa fa-edit"></i> Edit</a>
                                <a href="/post/delete/<?php echo $post->getId() ?>?csrfToken=<?php echo $csrfToken ?>" class="card-link"><i class="fa fa-trash"></i> Delete</a>
                            <?php endif; ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <form method="POST">
        <div class="cardbox-comments card-footer">
            <div class=" d-flex justify-content-center align-items-center">
                <span class="comment-avatar float-left">
                    <a href=""><img class="rounded-circle" src="https://picsum.photos/50/50" alt="..."></a>
                </span>
                <div class="search">
                    <label class="sr-only" for="comment">comment</label>
                    <input placeholder="Write a comment" type="text" name="comment">
                    <input type="hidden" name="csrfToken" value="<?php echo $csrfToken ?>">
                </div>
                <div class="send">
                    <a href="">

                        <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                    </a>
                </div>
            </div>
            <div class="text-center w-75">
                <?php if (isset($errors['comment'])) : ?>
                    <ul class="error"> <?= $errors['comment'][0] ?> </ul>
                <?php endif; ?>
                <?php if (isset($errors['root'])) : ?>
                    <ul class="error"> <?= $errors['root'] ?> </ul>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <?php foreach ($post->getAllComments() as $comment) : ?>
        <div class="cardbox-comments card-footer d-flex justify-content-center align-items-center">
            <span class="comment-avatar float-left">
                <a href=""><img class="rounded-circle" src="https://picsum.photos/50/50" alt="..."></a>
                <div class="h7 text-muted"><?php echo $comment->getUser()->getUsername() ?></div>
            </span>
            <div class="search">
                <?php echo $comment->getBody() ?>
            </div>
            <div class="send">
                <div class="h7 text-muted"><?php echo $comment->getPostedAt() ?></div>
            </div>
        </div>
    <?php endforeach; ?>

</div>