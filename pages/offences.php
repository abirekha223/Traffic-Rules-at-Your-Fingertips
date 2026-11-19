<?php

require_once "../config/database.php";

$sql = "SELECT * FROM offences ORDER BY offence_id";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fines & Penalties | Traffic Rules</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f5f4;
            color: #17252A;
            font-family: Georgia, "Times New Roman", serif;
        }


        /* ================= NAVBAR ================= */

        .navbar {
            background: #17252A;
            padding: 20px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-family: Arial, sans-serif;
            font-size: 21px;
            font-weight: bold;
        }

        .logo span {
            color: #b9d7d7;
            font-size: 13px;
            font-weight: normal;
            margin-left: 5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 14px;
            transition: 0.2s;
        }

        .nav-links a:hover {
            color: #9edbd4;
        }


        /* ================= HERO ================= */

        .hero {
            background: #f4f5f4;
            padding: 55px 7% 35px;
        }

        .hero-content {
            max-width: 1250px;
            margin: auto;
        }

        .eyebrow {
            color: #397b7b;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 3px;
            margin-bottom: 18px;
        }

        .hero h1 {
            font-size: 50px;
            line-height: 0.98;
            margin-bottom: 25px;
        }

        .hero p {
            max-width: 650px;
            color: #596668;
            font-size: 15px;
            line-height: 1.8;
        }

        .hero-note {
            float: right;
            margin-top: -45px;
            padding-left: 18px;
            border-left: 2px solid #53bdb6;
            font-size: 13px;
            line-height: 1.6;
        }

        .hero-note strong {
            display: block;
            margin-bottom: 3px;
        }


        /* ================= FILTERS ================= */

        .filters {
            max-width: 1250px;
            margin: 25px auto 25px;
            padding: 0 7%;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: white;
            border: 1px solid #ccdcdc;
            border-radius: 25px;
            padding: 9px 18px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-size: 13px;
            font-weight: bold;
            color: #17252A;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #17252A;
            color: white;
            border-color: #17252A;
        }


        /* ================= OFFENCES ================= */

        .offences-container {
            width: 86%;
            max-width: 1250px;
            margin: 0 auto 80px;
        }

        .offences-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .offence-card {
            background: white;
            border: 1px solid #dce4e4;
            border-radius: 14px;
            padding: 25px;
            transition: 0.25s;
        }

        .offence-card:hover {
            transform: translateY(-3px);
            border-color: #17252A;
        }


        /* CARD TOP */

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: start;
        }

        .offence-label {
            display: inline-block;
            background: #dff2f0;
            color: #397b7b;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .offence-number {
            color: #dceff0;
            font-size: 34px;
            font-weight: bold;
        }


        /* CARD CONTENT */

        .offence-card h2 {
            font-size: 21px;
            line-height: 1.3;
            margin: 22px 0 12px;
        }

        .description {
            color: #596668;
            font-size: 13px;
            line-height: 1.7;
            min-height: 45px;
        }


        /* INFORMATION */

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 20px;
        }

        .info-box {
            background: #f1f2f1;
            border-radius: 10px;
            padding: 15px;
        }

        .info-box span {
            display: block;
            color: #6e7b7d;
            font-family: Arial, sans-serif;
            font-size: 10px;
            letter-spacing: 1px;
            margin-bottom: 7px;
        }

        .info-box strong {
            font-size: 13px;
            line-height: 1.4;
        }


        /* PENALTY */

        .penalty-box {
            background: #17252A;
            color: white;
            border-radius: 12px;
            padding: 17px;
            margin-top: 16px;
        }

        .penalty-label {
            color: #9edbd4;
            font-family: Arial, sans-serif;
            font-size: 10px;
            letter-spacing: 2px;
            margin-bottom: 7px;
        }

        .penalty-text {
            font-size: 15px;
            font-weight: bold;
            line-height: 1.5;
        }


        /* CARD FOOTER */

        .card-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 18px;
        }

        .source-link {
            color: #17252A;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .source-link:hover {
            text-decoration: underline;
        }


        /* NO RESULTS */

        .no-results {
            background: white;
            border: 1px solid #dce4e4;
            padding: 40px;
            text-align: center;
            color: #687577;
        }


        /* ================= FOOTER ================= */

        footer {
            background: #17252A;
            color: #c7d2d3;
            text-align: center;
            padding: 30px;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .navbar {
                flex-direction: column;
                gap: 18px;
                padding: 20px 25px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .hero {
                padding: 50px 7% 30px;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero-note {
                float: none;
                margin-top: 25px;
            }

            .offences-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 550px) {

            .info-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 36px;
            }

            .offences-container {
                width: 90%;
            }

        }

    </style>

</head>


<body>


<!-- ================= NAVBAR ================= -->

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



<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-content">

        <div class="eyebrow">
            // KNOW THE CONSEQUENCES
        </div>

        <h1>
            Traffic Fines<br>
            & Penalties
        </h1>

        <p>
            Understand common traffic offences, applicable penalties
            and legal references. Knowing the consequences helps
            everyone make safer choices on the road.
        </p>


        <div class="hero-note">

            <strong>Drive responsibly.</strong>

            Avoid penalties. Keep the roads safe.

        </div>

    </div>

</section>



<!-- ================= FILTERS ================= -->

<div class="filters">

    <button
        class="filter-btn active"
        onclick="filterOffences('all', this)"
    >
        All
    </button>

    <button
        class="filter-btn"
        onclick="filterOffences('two-wheeler', this)"
    >
        Two-Wheeler
    </button>

    <button
        class="filter-btn"
        onclick="filterOffences('four-wheeler', this)"
    >
        Four-Wheeler
    </button>

    <button
        class="filter-btn"
        onclick="filterOffences('general', this)"
    >
        General
    </button>

</div>



<!-- ================= OFFENCE CARDS ================= -->

<main class="offences-container">

    <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="offences-grid">

            <?php while ($row = mysqli_fetch_assoc($result)) {

                $vehicle = strtolower($row["vehicle_type"]);

                if (
                    strpos($vehicle, "two") !== false ||
                    strpos($vehicle, "motorcycle") !== false ||
                    strpos($vehicle, "bike") !== false
                ) {
                    $filter_category = "two-wheeler";
                }
                elseif (
                    strpos($vehicle, "four") !== false ||
                    strpos($vehicle, "car") !== false
                ) {
                    $filter_category = "four-wheeler";
                }
                else {
                    $filter_category = "general";
                }

            ?>

                <article
                    class="offence-card"
                    data-category="<?php echo $filter_category; ?>"
                >


                    <!-- TOP -->

                    <div class="card-top">

                        <span class="offence-label">
                            TRAFFIC OFFENCE
                        </span>

                        <span class="offence-number">
                            <?php
                            echo str_pad(
                                $row["offence_id"],
                                2,
                                "0",
                                STR_PAD_LEFT
                            );
                            ?>
                        </span>

                    </div>


                    <!-- TITLE -->

                    <h2>
                        <?php
                        echo htmlspecialchars($row["offence_name"]);
                        ?>
                    </h2>


                    <!-- DESCRIPTION -->

                    <p class="description">
                        <?php
                        echo htmlspecialchars($row["description"]);
                        ?>
                    </p>


                    <!-- INFORMATION -->

                    <div class="info-grid">

                        <div class="info-box">

                            <span>
                                VEHICLE
                            </span>

                            <strong>
                                <?php
                                echo htmlspecialchars($row["vehicle_type"]);
                                ?>
                            </strong>

                        </div>


                        <div class="info-box">

                            <span>
                                LEGAL SECTION
                            </span>

                            <strong>
                                <?php
                                echo htmlspecialchars($row["legal_reference"]);
                                ?>
                            </strong>

                        </div>

                    </div>


                    <!-- PENALTY -->

                    <div class="penalty-box">

                        <div class="penalty-label">
                            PENALTY
                        </div>

                        <div class="penalty-text">
                            <?php
                            echo htmlspecialchars($row["penalty"]);
                            ?>
                        </div>

                    </div>


                    <!-- SOURCE -->

                    <div class="card-footer">

                        <a
                            class="source-link"
                            href="<?php
                            echo htmlspecialchars(
                                $row["source"],
                                ENT_QUOTES,
                                "UTF-8"
                            );
                            ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            VIEW OFFICIAL SOURCE ↗
                        </a>

                    </div>


                </article>

            <?php } ?>

        </div>

    <?php } else { ?>

        <div class="no-results">
            No traffic offences are available at the moment.
        </div>

    <?php } ?>

</main>



<!-- ================= FOOTER ================= -->

<footer>

    Traffic Rules at Your Fingertips © 2026

</footer>



<!-- ================= FILTER JAVASCRIPT ================= -->

<script>

function filterOffences(category, button) {

    const cards = document.querySelectorAll(".offence-card");

    const buttons = document.querySelectorAll(".filter-btn");


    buttons.forEach(function(btn) {

        btn.classList.remove("active");

    });


    button.classList.add("active");


    cards.forEach(function(card) {

        const cardCategory = card.getAttribute("data-category");


        if (
            category === "all" ||
            cardCategory === category
        ) {

            card.style.display = "";

        } else {

            card.style.display = "none";

        }

    });

}

</script>


</body>

</html>