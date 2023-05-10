<?php
include './menu.inc';

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<body>
    <article>
        <section id="enhan_list">
            <h1 id="heading1">Enhancement 3</h1>


            <ol>
                <li>Enhancement 1 :
                    <ul>
                        <li>
                            <a href="login.php">Login page aloows</a>
                        </li>
                        <p>This page allows registered users to log in to their account. To log in, users need to provide their email address and password. Upon successful authentication, users will be redirected to their dashboard.
                        </p>
                    </ul>
                </li>
                <li>Enhancement 2 :
                    <ul>
                        <li>
                            <a href="registration.php">Registration</a>
                        </li>
                        <p>This page allows new users to register for an account. To register, users need to provide their name, email address, password, and confirm password. Users can also select their role as either an admin or a regular user. Upon successful registration, users will be redirected to the login page.</p>
                    </ul>
                </li>
                <li>Enhancement 3 :
                    <ul>
                        <li>
                            <a href="apply.php">Logout </a>
                        </li>
                        <p>This page allows users to log out of their account. When a user logs out, their session is destroyed, and they are redirected to the login page. It's important to log out of an account when using a public computer or when finished with a session to prevent unauthorized access to the user's account.</p>
                    </ul>
                </li>

            </ol>
        </section>
    </article>
</body>


<?php
include './footer.inc';
?>