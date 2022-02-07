<div class="navbar-default">
    <ul>
        <li class="nav-item"><a href="/home">Home</a></li>
        <li class="nav-item"><a href="/tutorials">Tutorials</a></li>
        <li class="nav-item"><a href="/classes">Classes</a></li>
        <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item"><a href="/dashboard">Dashboard</a></li>
            <li class="nav-item">
                <a id="logout" href="/logout">Logout</a>
            </li>
            <li class="nav-item"><p>(<?= $_SESSION['user']->username; ?>)</p></li>
        <?php else: ?>
            <li class="nav-item"><a href="/login">Login</a></li>
            <li class="nav-item"><a href="/register">Register</a></li>
        <?php endif; ?>
    </ul>
</div> 