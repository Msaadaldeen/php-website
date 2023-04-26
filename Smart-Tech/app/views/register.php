<div class="container mb-5">
  <hr style="margin-top: 6em;">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <header class="card-header">
          <a href="/login" class="float-right btn btn-outline-info mt-1">Log in</a>
          <h4 class="card-title mt-2">Sign up</h4>
        </header>
        <article class="card-body">
          <form method="POST" action="" novalidate>
            <input type="hidden" name="csrfToken" value="<?php echo $csrfToken ?>">
            <div class="form-row">
              <div class="col form-group">
                <label>First name </label>
                <input type="text" class="form-control" name="firstName">
                <?php if (isset($errors['firstName'])) : ?>
                  <ul class="error"> <?= $errors['firstName'][0] ?> </ul>
                <?php endif; ?>
              </div>
              <div class="col form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name="lastName">
                <?php if (isset($errors['lastName'])) : ?>
                  <ul class="error"> <?= $errors['lastName'][0] ?> </ul>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control" name="email">
              <?php if (isset($errors['email'])) : ?>
                <ul class="error"> <?= $errors['email'][0] ?> </ul>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="male">
                <span class="form-check-label"> Male </span>
              </label>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="female">
                <span class="form-check-label"> Female</span>
              </label>
              <?php if (isset($errors['gender'])) : ?>
                <ul class="error"> <?= $errors['gender'][0] ?> </ul>
              <?php endif; ?>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>City</label>
                <input type="text" class="form-control" name="city">
                <?php if (isset($errors['city'])) : ?>
                  <ul class="error"> <?= $errors['city'][0] ?> </ul>
                <?php endif; ?>
              </div>
              <div class="form-group col-md-6">
                <label>Country</label>
                <select id="inputState" class="form-control" name="country">
                  <option disabled selected> Choose your Country</option>
                  <option value="holland">Holland</option>
                  <option value="germeny">Germany</option>
                  <option value="austria">Austria</option>
                  <option value="france">France</option>
                  <option value="italy">Italy</option>
                  <option value="spain">Spain</option>
                  <option value="switzerland">Switzerland</option>
                </select>
                <?php if (isset($errors['country'])) : ?>
                  <ul class="error"> <?= $errors['country'][0] ?> </ul>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input class="form-control" type="name" name="username">
              <?php if (isset($errors['username'])) : ?>
                <ul class="error"> <?= $errors['username'][0] ?> </ul>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Create password</label>
              <input class="form-control" type="password" name="password">
              <?php if (isset($errors['password'])) : ?>
                <ul class="error"> <?= $errors['password'][0] ?> </ul>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Repeat password</label>
              <input class="form-control" type="password" name="passwordConfirmation">
              <?php if (isset($errors['passwordConfirmation'])) : ?>
                <ul class="error"> <?= $errors['passwordConfirmation'][0] ?> </ul>
              <?php endif; ?>
            </div>
            <div>
              <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="termOfService">
              <label for="btncheck1">I have read and agree the Website <a href="">Terms and Conditions</a>.</label>
              <?php if (isset($errors['termOfService'])) : ?>
                <ul class="error"> <?= $errors['termOfService'][0] ?> </ul>
              <?php endif; ?>
            </div>
            <div>
              <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
              <label for="btncheck2">I would like to subscribe the Newsletter.</label>
            </div>
            <?php if (isset($errors['root'])) : ?>
              <ul class="error"> <?= $errors['root'] ?> </ul>
            <?php endif; ?>
            <div class="form-group">
              <button type="submit" class="btn btn-info btn-block"> Register </button>
            </div>
          </form>
        </article>
        <div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
      </div>
    </div>
  </div>
</div>