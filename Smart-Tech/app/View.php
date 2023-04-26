<?php

namespace App;

use App\Models\User;
use App\Helpers\CSRFProtection;
use App\Helpers\Session;

class View
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function render(string $view, array $data = [])
    {
        extract($data);
        $user = $this->user;

        $csrfToken = CSRFProtection::token();
        $session = Session::class;

        require_once '../app/views/partials/header.php';
        require_once "../app/views/{$view}.php";
        require_once '../app/views/partials/footer.php';

        exit();
    }
}
