<?php
    session_start();
    //validating step
    require_once "header_admin.php";
    require_once "layouts/css/style.html";
?>
<body>
    <div class="spacer">

    </div>
    <div class="wrapper-flex">
        <div class="sidebar">
            <div class="menu-item">
                <a href="home.php?view=Statistics">Statistics</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=ContentManager">Content Manager</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=Contacts">Contacts</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=Mailer">Mailer</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=Registering">User Register</a>
            </div>
        </div>
        <div class="spacer">

        </div>
        <div class="content">
            <?php
            // PHP view handling 
            if (isset($_GET['view'])) {
                $view = $_GET['view'];
                switch ($view) {
                    case 'Statistics':
                        include('views/statistics.php');
                        break;
                    case 'ContentManager':
                        include('views/content_manage.php');
                        break;
                    case 'Contacts':
                        include('views/contact.php');
                        break;
                    case 'Mailer':
                        include('views/mailer.php');
                        break;
                    case 'Registering':
                        include('views/registering.php');
                        break;
                    default:
                        include('views/default_view.php');
                }
            } else {
                include('views/default_view.php');
            }
            ?>
        </div>
        <div class="spacer">

        </div>
    </div>
</html>
