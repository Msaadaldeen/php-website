<div class="main-content">

    <div class="header mt-5 pt-5 pt-lg-8 d-flex align-items-center">
        <span class="mask bg-gradient-default opacity-8"></span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello <?= $user->getFirstName() ?></h1>
                    <p class="text-white mt-0 mb-5">This is your profile page. You can see your personal data and manage it.</p>
                    <a href="#!" class="btn btn-info">Edit profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7 mt-5">
        <div class="row">

            <div class="col-xl-8 order-xl-1 mb-5">
                <div class="card bg-light shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?= $user->getUserName() ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="<?= $user->getEmail() ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">First name</label>
                                            <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="<?= $user->getFirstName() ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Last name</label>
                                            <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="<?= $user->getLastName() ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-gender">Gender</label>
                                            <input type="text" id="input-gender" class="form-control form-control-alternative" placeholder="Gender" value="<?= $user->getGender() ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">

                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-6">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">City</label>
                                                <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="Your city" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">Country</label>
                                                <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Your country" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">

                                <h6 class="heading-small text-muted mb-4">About</h6>
                                <div class="pl-lg-6">
                                    <div class="form-group focused">
                                        <label>About Me</label>
                                        <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."></textarea>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>