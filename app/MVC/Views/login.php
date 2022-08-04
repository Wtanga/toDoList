<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
    <main class="form-signin">
        <div class="row justify-content-center">
            <div class="col-lg-3 mt-5">
                <form method="post" action="/user/authentication">
                    <h2 class="text-center">Login form</h2>
                    <?php if(isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                    <?php endif; ?>
                    <!-- Login input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="login">Login</label>
                        <input name="login" type="text" id="login" class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input name="password" type="password" id="password" class="form-control" />
                    </div>

                    <!-- Submit button -->
                    <input type="submit" class="btn btn-primary btn-block mb-4" value="Login">
                </form>
            </div>
        </div>
    </main>
</body>
</html>