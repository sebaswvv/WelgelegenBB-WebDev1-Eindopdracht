<?php require_once __DIR__ . '/../components/head.inc.php'; ?>
<?php require_once __DIR__ . '/../components/header.inc.php'; ?>

<div class="container">
    <h1>Login</h1>
    <form>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" />
            <label class="form-label" for="form2Example1">Email address</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" />
            <label class="form-label" for="form2Example2">Password</label>
        </div>
        <!-- Submit button -->
        <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>
    </form>
</div>

<?php require_once __DIR__ . '/../components/footer.inc.php'; ?>