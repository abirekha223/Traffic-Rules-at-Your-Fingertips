<?php

session_start();

require_once "../config/database.php";

// Check if admin is logged in
if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit();
}

// Get total counts
$rules_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM traffic_rules");
$rules_count = mysqli_fetch_assoc($rules_query)["total"];

$offences_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM offences");
$offences_count = mysqli_fetch_assoc($offences_query)["total"];

$signs_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM road_signs");
$signs_count = mysqli_fetch_assoc($signs_query)["total"];

$faqs_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM faqs");
$faqs_count = mysqli_fetch_assoc($faqs_query)["total"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Traffic Rules</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f6;
            color: #17252A;
        }

        /* NAVBAR */

        .navbar {
            background: #17252A;
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .logo span {
            font-weight: normal;
            font-size: 14px;
            color: #b8d8d8;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-name {
            font-size: 14px;
        }

        .logout {
            text-decoration: none;
            color: white;
            border: 1px solid #ffffff;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 13px;
        }

        .logout:hover {
            background: white;
            color: #17252A;
        }

        /* MAIN */

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
        }

        .welcome {
            margin-bottom: 35px;
        }

        .welcome h1 {
            font-size: 36px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #647174;
            font-size: 16px;
        }

        /* STAT CARDS */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 45px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #e1e5e5;
        }

        .stat-card h3 {
            font-size: 14px;
            color: #687477;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-number {
            font-size: 38px;
            font-weight: bold;
            color: #17252A;
        }

        /* QUICK ACTIONS */

        .section-title {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .action-card {
            background: white;
            padding: 25px;
            border: 1px solid #e1e5e5;
            border-radius: 8px;
            text-decoration: none;
            color: #17252A;
            transition: 0.2s;
        }

        .action-card:hover {
            transform: translateY(-3px);
            border-color: #17252A;
        }

        .action-card h3 {
            margin-bottom: 8px;
            font-size: 19px;
        }

        .action-card p {
            color: #687477;
            font-size: 14px;
            line-height: 1.5;
        }

        .arrow {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        /* RESPONSIVE */

        @media (max-width: 800px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .actions {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 18px 25px;
            }

            .container {
                width: 90%;
            }

        }

        @media (max-width: 500px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .admin-name {
                display: none;
            }

            .welcome h1 {
                font-size: 28px;
            }

        }

    </style>

</head>

<body>

    <!-- NAVBAR -->

    <header class="navbar">

        <div class="logo">
            Traffic Rules
            <span>at Your Fingertips</span>
        </div>

        <div class="admin-info">

            <div class="admin-name">
                Welcome, <?php echo htmlspecialchars($_SESSION["full_name"]); ?>
            </div>

            <a href="logout.php" class="logout">
                Logout
            </a>

        </div>

    </header>


    <!-- MAIN CONTENT -->

    <main class="container">

        <section class="welcome">

            <h1>Admin Dashboard</h1>

            <p>
                Manage and monitor the traffic information available on the website.
            </p>

        </section>


        <!-- STATISTICS -->

        <section class="stats">

            <div class="stat-card">

                <h3>Traffic Rules</h3>

                <div class="stat-number">
                    <?php echo $rules_count; ?>
                </div>

            </div>


            <div class="stat-card">

                <h3>Offences</h3>

                <div class="stat-number">
                    <?php echo $offences_count; ?>
                </div>

            </div>


            <div class="stat-card">

                <h3>Road Signs</h3>

                <div class="stat-number">
                    <?php echo $signs_count; ?>
                </div>

            </div>


            <div class="stat-card">

                <h3>FAQs</h3>

                <div class="stat-number">
                    <?php echo $faqs_count; ?>
                </div>

            </div>

        </section>


        <!-- QUICK ACTIONS -->

        <h2 class="section-title">
            Quick Access
        </h2>

        <section class="actions">

            <a href="../pages/traffic_rules.php" class="action-card">

                <h3>Traffic Rules</h3>

                <p>
                    View the traffic rules stored in the system.
                </p>

                <span class="arrow">
                    VIEW RULES →
                </span>

            </a>


            <a href="../pages/offences.php" class="action-card">

                <h3>Fines & Penalties</h3>

                <p>
                    View offences, penalties and legal references.
                </p>

                <span class="arrow">
                    VIEW OFFENCES →
                </span>

            </a>


            <a href="../pages/road_signs.php" class="action-card">

                <h3>Road Signs</h3>

                <p>
                    View the different road signs and their meanings.
                </p>

                <span class="arrow">
                    VIEW SIGNS →
                </span>

            </a>


            <a href="../pages/faqs.php" class="action-card">

                <h3>FAQs</h3>

                <p>
                    View frequently asked questions about traffic rules.
                </p>

                <span class="arrow">
                    VIEW FAQs →
                </span>

            </a>

        </section>

    </main>

</body>

</html>