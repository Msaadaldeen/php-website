<div class="container mb-5">
    <hr style="margin-top: 6em;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <a href="/register" class="float-right btn btn-outline-info mt-1">Sign up</a>
                    <h4 class="card-title mt-2">Log in</h4>
                </header>
                <article class="card-body">
                    <form method="POST" action="" novalidate>
                        <input type="hidden" name="csrfToken" value="<?php echo $csrfToken ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                            <?php if (isset($errors['username'])) : ?>
                                <ul class="error"> <?= $errors['username'][0] ?> </ul>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                            <?php if (isset($errors['password'])) : ?>
                                <ul class="error"> <?= $errors['password'][0] ?> </ul>
                            <?php endif; ?>
                        </div>
                        <div class="float-right"><a href="">Forget your Password?</a></div>
                        <div>
                            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                            <label for="btncheck2">Remember me</label>
                        </div>
                        <?php if (isset($errors['root'])) : ?>
                            <ul class="error"> <?= $errors['root'] ?> </ul>
                        <?php endif; ?>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">Sign in</button>
                        </div>

                    </form>
                    <div class="border-top card-body text-center">Don't have an account? <a href="index.php">Sign up</a></div>
                </article>
            </div>
        </div>
    </div>
</div>