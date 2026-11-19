<?php

require_once "../config/database.php";

$sql = "SELECT * FROM road_signs ORDER BY sign_id";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Road Signs | Traffic Rules at Your Fingertips</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7f7;
            color: #17252A;
        }

        /* NAVBAR */

        .navbar {
            background: #17252A;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 21px;
            font-weight: bold;
        }

        .logo span {
            font-size: 13px;
            font-weight: normal;
            color: #b9d7d7;
            margin-left: 5px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-links a:hover {
            color: #9edbd4;
        }

        /* HERO */

        .hero {
            background: #17252A;
            color: white;
            padding: 75px 10%;
        }

        .eyebrow {
            font-size: 12px;
            letter-spacing: 3px;
            color: #9edbd4;
            margin-bottom: 18px;
            text-transform: uppercase;
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.05;
            max-width: 750px;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 650px;
            color: #c7d2d3;
            font-size: 17px;
            line-height: 1.7;
        }

        /* CONTENT */

        .container {
            width: 85%;
            max-width: 1200px;
            margin: 70px auto;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 35px;
        }

        .section-heading h2 {
            font-size: 32px;
        }

        .section-heading p {
            color: #697577;
            font-size: 14px;
        }

        /* SIGNS GRID */

        .signs-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .sign-card {
            background: white;
            border: 1px solid #e0e5e5;
            padding: 25px;
            text-align: center;
            transition: 0.25s;
        }

        .sign-card:hover {
            transform: translateY(-4px);
            border-color: #17252A;
        }

        .sign-number {
            text-align: left;
            font-size: 12px;
            color: #7a8889;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .sign-image {
            width: 140px;
            height: 140px;
            object-fit: contain;
            margin: 0 auto 20px;
            display: block;
        }

        .sign-placeholder {
            width: 140px;
            height: 140px;
            margin: 0 auto 20px;
            background: #eef2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #7a8889;
            font-size: 13px;
        }

        .sign-category {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #477b78;
            margin-bottom: 9px;
        }

        .sign-card h3 {
            font-size: 19px;
            margin-bottom: 12px;
        }

        .meaning {
            color: #596668;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .action {
            border-top: 1px solid #e5e9e9;
            padding-top: 15px;
            font-size: 12px;
            color: #687577;
        }

        .action strong {
            display: block;
            color: #17252A;
            margin-top: 5px;
        }

        /* SOURCE */

        .source {
            margin-top: 15px;
        }

        .source a {
            color: #17252A;
            text-decoration: none;
            font-size: 11px;
            font-weight: bold;
        }

        .source a:hover {
            text-decoration: underline;
        }

        /* EMPTY */

        .no-signs {
            background: white;
            padding: 40px;
            text-align: center;
            border: 1px solid #e0e5e5;
            color: #687577;
        }

        /* FOOTER */

        footer {
            background: #17252A;
            color: #c7d2d3;
            padding: 30px 10%;
            margin-top: 80px;
            text-align: center;
            font-size: 13px;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {

            .signs-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 800px) {

            .navbar {
                padding: 18px 25px;
                flex-direction: column;
                gap: 18px;
            }

            .nav-links {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                padding: 60px 8%;
            }

            .hero h1 {
                font-size: 40px;
            }

            .container {
                width: 90%;
            }

        }

        @media (max-width: 550px) {

            .signs-grid {
                grid-template-columns: 1fr;
            }

            .section-heading {
                display: block;
            }

            .section-heading p {
                margin-top: 10px;
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

    <nav class="nav-links">

        <a href="../index.php">Home</a>

        <a href="traffic_rules.php">Rules</a>

        <a href="offences.php">Fines</a>

        <a href="road_signs.php">Traffic Signs</a>

        <a href="faqs.php">FAQs</a>

    </nav>

</header>


<!-- HERO -->

<section class="hero">

    <div class="eyebrow">
        Read The Road
    </div>

    <h1>
        Know Your<br>
        Road Signs.
    </h1>

    <p>
        Traffic signs communicate important information to
        drivers, riders and pedestrians. Learn what each sign
        means and what action you should take.
    </p>

</section>


<!-- ROAD SIGNS -->

<main class="container">

    <div class="section-heading">

        <h2>
            Road Signs
        </h2>

        <p>
            <?php echo mysqli_num_rows($result); ?> signs available
        </p>

    </div>


    <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="signs-grid">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <article class="sign-card">

                    <div class="sign-number">
                        <?php echo str_pad($row["sign_id"], 2, "0", STR_PAD_LEFT); ?>
                    </div>


                    <?php

                    $image_path = "../images/" . $row["image"];

                    if (!empty($row["image"]) && file_exists($image_path)) {

                    ?>

                        <img
                            src="<?php echo htmlspecialchars($image_path); ?>"
                            alt="<?php echo htmlspecialchars($row["sign_name"]); ?>"
                            class="sign-image"
                        >

                    <?php } else { ?>

                        <div class="sign-placeholder">
                            Sign Image
                        </div>

                    <?php } ?>


                    <div class="sign-category">
                        <?php echo htmlspecialchars($row["category"]); ?>
                    </div>


                    <h3>
                        <?php echo htmlspecialchars($row["sign_name"]); ?>
                    </h3>


                    <p class="meaning">
                        <?php echo htmlspecialchars($row["meaning"]); ?>
                    </p>


                    <div class="action">

                        ACTION REQUIRED

                        <strong>
                            <?php echo htmlspecialchars($row["action_required"]); ?>
                        </strong>

                    </div>


                    <div class="source">

                        <a
                            href="<?php echo htmlspecialchars($row["source"], ENT_QUOTES, "UTF-8"); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            OFFICIAL SOURCE ↗
                        </a>

                    </div>

                </article>

            <?php } ?>

        </div>

    <?php } else { ?>

        <div class="no-signs">

            No road signs are available at the moment.

        </div>

    <?php } ?>

</main>


<!-- FOOTER -->

<footer>

    Traffic Rules at Your Fingertips © 2026

</footer>


</body>

</html>