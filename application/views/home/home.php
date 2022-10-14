<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="py-5">
        <div class="container card shadow-sm py-4">
            <h1 class="text-center"><?= $title ?></h1>
            <form action="<?= base_url() ?>home/new" id="email">
                <input type="hidden" id="CSRF" name="CSRF" value="<?= $this->session->CSRF ?>">
                <div class="row">
                    <div class="col mb-3 ">
                        <label for="firstName" class="form-label">First name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" required>
                    </div>
                    <div class="col mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" name="surname" id="surname" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="emailAddress" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="emailAddress" id="emailAddress" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                </div>
                <div class="mb-3" id="response">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/js/jquery-3.6.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>