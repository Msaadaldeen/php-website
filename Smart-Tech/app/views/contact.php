<div class="container mt-5 pt-5">

    <h3 class="text-center">Contact us</h3><br />

    <div class="row">
        <div class="col-md-8">
            <form action="" method="POST">
                <input type="hidden" name="csrfToken" value="<?php echo $csrfToken ?>">
                <label class="sr-only" for="name">name</label>
                <input class="form-control" name="name" placeholder="Name..." /><br />
                <?php if (isset($errors['name'])) : ?>
                    <ul class="error"> <?= $errors['name'][0] ?> </ul>
                <?php endif; ?>
                <label class="sr-only" for="email">email</label>
                <input class="form-control" name="email" placeholder="E-mail..." /><br />
                <?php if (isset($errors['email'])) : ?>
                    <ul class="error"> <?= $errors['email'][0] ?> </ul>
                <?php endif; ?>
                <label class="sr-only" for="phone">phone</label>
                <input class="form-control" name="phone" placeholder="Phone..." /><br />
                <?php if (isset($errors['phone'])) : ?>
                    <ul class="error"> <?= $errors['phone'][0] ?> </ul>
                <?php endif; ?>
                <label class="sr-only" for="subject">subject</label>
                <input class="form-control" name="subject" placeholder="subject..." /><br />
                <?php if (isset($errors['subject'])) : ?>
                    <ul class="error"> <?= $errors['subject'][0] ?> </ul>
                <?php endif; ?>
                <label class="sr-only" for="letter">message</label>
                <textarea class="form-control" name="letter" placeholder="How can we help you?" style="height:150px;"></textarea><br />
                <?php if (isset($errors['letter'])) : ?>
                    <ul class="error"> <?= $errors['letter'][0] ?> </ul>
                <?php endif; ?>
                <input class="btn btn-info" type="submit" value="Send" /><br /><br />
            </form>
        </div>
        <div class="col-md-4">
            <div class="contact-info">
                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" />
                <h2>Contact Us</h2>
                <h4>We would love to hear from you !</h4>
            </div>
            <div>
                <b>Customer service:</b> <br />
                Phone: ..........<br />
                E-mail: <a href="mailto:support@mysite.com">support@smartech.com</a><br />
                <br /><br />
            </div>
        </div>
    </div>

</div>