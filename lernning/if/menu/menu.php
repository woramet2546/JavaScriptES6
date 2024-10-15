<header class="d-flex justify-content-center py-3 bg-dark">
    <ul class="nav nav-pills">
        <?php if ($status === "admin") { ?>
            <li class="nav-item"><a href="#" class="nav-link">Admin(only)</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            <a href="/ProjectJs/lernning/if/login.php" class="btn btn-danger">Logout</a>

        <?php } else if ($status === "user") { ?>
            <li class="nav-item"><a href="#" class="nav-link">User(only)</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            <a href="/ProjectJs/lernning/if/login.php" class="btn btn-danger">Logout</a>
        <?php } ?>
    </ul>
</header>