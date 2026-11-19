<?php

require_once "../config/database.php";

$sql = "SELECT * FROM traffic_rules ORDER BY rule_id";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Traffic Rules | Traffic Rules at Your Fingertips</title>

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
            padding: 80px 10%;
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

        /* RULE CARDS */

        .rules-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .rule-card {
            background: white;
            border: 1px solid #e0e5e5;
            padding: 30px;
            position: relative;
            transition: 0.25s;
        }

        .rule-card:hover {
            transform: translateY(-4px);
            border-color: #17252A;
        }

        .rule-number {
            font-size: 13px;
            color: #7a8889;
            letter-spacing: 2px;
            margin-bottom: 18px;
        }

        .rule-category {
            display: inline-block;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #477b78;
            margin-bottom: 12px;
        }

        .rule-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .rule-description {
            color: #596668;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .rule-info {
            border-top: 1px solid #e5e9e9;
            padding-top: 18px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .info-box {
            font-size: 12px;
            color: #687577;
        }

        .info-box strong {
            display: block;
            color: #17252A;
            font-size: 13px;
            margin-top: 5px;
        }

        /* SOURCE */

        .source {
            margin-top: 18px;
        }

        .source a {
            color: #17252A;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
        }

        .source a:hover {
            text-decoration: underline;
        }

        /* EMPTY */

        .no-rules {
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

            .rules-grid {
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
        Know The Rules
    </div>

    <h1>
        Traffic Rules<br>
        Made Simple.
    </h1>

    <p>
        Understand the essential traffic rules, responsibilities
        and safe driving practices that help make Maharashtra's
        roads safer for everyone.
    </p>

</section>


<!-- RULES -->

<main class="container">

    <div class="section-heading">

        <div>

            <h2>
                Essential Traffic Rules
            </h2>

        </div>

        <p>
            <?php echo mysqli_num_rows($result); ?> rules available
        </p>

    </div>


    <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="rules-grid">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <article class="rule-card">

                    <div class="rule-number">
                        <?php echo str_pad($row["rule_id"], 2, "0", STR_PAD_LEFT); ?>
                    </div>

                    <div class="rule-category">
                        <?php echo htmlspecialchars($row["category"]); ?>
                    </div>

                    <h3>
                        <?php echo htmlspecialchars($row["title"]); ?>
                    </h3>

                    <p class="rule-description">
                        <?php echo htmlspecialchars($row["description"]); ?>
                    </p>

                    <div class="rule-info">

                        <div class="info-box">

                            APPLICABLE TO

                            <strong>
                                <?php echo htmlspecialchars($row["applicable_to"]); ?>
                            </strong>

                        </div>

                        <div class="info-box">

                            LAST UPDATED

                            <strong>
                                <?php echo htmlspecialchars($row["last_updated"]); ?>
                            </strong>

                        </div>

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

        <div class="no-rules">

            No traffic rules are available at the moment.

        </div>

    <?php } ?>

</main>


<!-- FOOTER -->

<footer>

    Traffic Rules at Your Fingertips © 2026

</footer>


</body>

</html>