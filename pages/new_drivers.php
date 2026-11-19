<?php

require_once "../config/database.php";


// =========================
// GET TRAFFIC RULES
// =========================

$rules_sql = "
    SELECT *
    FROM traffic_rules
    WHERE
        title LIKE '%Helmet%'
        OR title LIKE '%Seat%'
        OR title LIKE '%Mobile%'
        OR title LIKE '%Speed%'
        OR title LIKE '%Licence%'
        OR title LIKE '%Signal%'
        OR title LIKE '%Emergency%'
        OR title LIKE '%Distance%'
        OR title LIKE '%Accident%'
    ORDER BY rule_id
    LIMIT 8
";

$rules_result = mysqli_query($conn, $rules_sql);


// =========================
// GET ROAD SIGNS
// =========================

$signs_sql = "
    SELECT *
    FROM road_signs
    ORDER BY sign_id
    LIMIT 8
";

$signs_result = mysqli_query($conn, $signs_sql);


// =========================
// GET OFFENCES
// =========================

$offences_sql = "
    SELECT *
    FROM offences
    WHERE
        offence_name LIKE '%Licence%'
        OR offence_name LIKE '%Speed%'
        OR offence_name LIKE '%Helmet%'
        OR offence_name LIKE '%Seat%'
        OR offence_name LIKE '%Mobile%'
        OR offence_name LIKE '%Dangerous%'
        OR offence_name LIKE '%Alcohol%'
    ORDER BY offence_id
    LIMIT 6
";

$offences_result = mysqli_query($conn, $offences_sql);


// =========================
// GET FAQs
// =========================

$faqs_sql = "
    SELECT *
    FROM faqs
    ORDER BY faq_id
    LIMIT 6
";

$faqs_result = mysqli_query($conn, $faqs_sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>New Drivers | Traffic Rules at Your Fingertips</title>


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


        /* =========================
           NAVBAR
        ========================= */

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


        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 580px;

            position: relative;

            display: flex;

            align-items: center;

            overflow: hidden;

            color: white;

            background-image:

                linear-gradient(
                    90deg,
                    rgba(10, 27, 32, 0.97) 0%,
                    rgba(10, 27, 32, 0.88) 35%,
                    rgba(10, 27, 32, 0.45) 65%,
                    rgba(10, 27, 32, 0.15) 100%
                ),

                url("../images/new-drivers.png");

            background-size: cover;

            background-position: center;
        }


        .hero-content {
            width: 55%;

            max-width: 700px;

            margin-left: 8%;

            position: relative;

            z-index: 2;
        }


        .eyebrow {
            color: #9edbd4;

            font-size: 11px;

            letter-spacing: 4px;

            text-transform: uppercase;

            margin-bottom: 20px;
        }


        .hero h1 {
            font-size: 62px;

            line-height: 1.05;

            letter-spacing: -2px;

            margin-bottom: 25px;
        }


        .hero h1 span {
            color: #9edbd4;
        }


        .hero p {
            color: #d1dddd;

            max-width: 600px;

            font-size: 16px;

            line-height: 1.8;

            margin-bottom: 30px;
        }


        .hero-button {
            display: inline-block;

            background: #9edbd4;

            color: #17252A;

            padding: 15px 25px;

            text-decoration: none;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 1px;
        }


        .hero-button:hover {
            background: white;
        }


        /* =========================
           INTRO
        ========================= */

        .intro {
            width: 85%;

            max-width: 1200px;

            margin: 80px auto 60px;
        }


        .intro-label {
            color: #477b78;

            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            margin-bottom: 12px;
        }


        .intro h2 {
            font-size: 38px;

            margin-bottom: 20px;
        }


        .intro p {
            color: #596668;

            font-size: 16px;

            line-height: 1.8;

            max-width: 850px;
        }


        /* =========================
           SECTION
        ========================= */

        .content-section {
            background: white;

            padding: 75px 8%;
        }


        .content-section.dark {
            background: #17252A;

            color: white;
        }


        .section-heading {
            margin-bottom: 40px;
        }


        .section-heading .number {
            color: #477b78;

            font-size: 11px;

            letter-spacing: 3px;

            margin-bottom: 10px;
        }


        .dark .section-heading .number {
            color: #9edbd4;
        }


        .section-heading h2 {
            font-size: 36px;

            margin-bottom: 10px;
        }


        .section-heading p {
            color: #697577;

            font-size: 14px;

            line-height: 1.6;
        }


        .dark .section-heading p {
            color: #bdc9ca;
        }


        /* =========================
           RULE CARDS
        ========================= */

        .rules-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;
        }


        .rule-card {
            border: 1px solid #dfe5e5;

            padding: 28px;

            min-height: 220px;

            background: #ffffff;
        }


        .rule-number {
            color: #879496;

            font-size: 11px;

            letter-spacing: 2px;

            margin-bottom: 25px;
        }


        .rule-card h3 {
            font-size: 19px;

            margin-bottom: 12px;
        }


        .rule-card p {
            color: #687577;

            font-size: 13px;

            line-height: 1.7;
        }


        .rule-meta {
            margin-top: 18px;

            font-size: 11px;

            color: #477b78;
        }


        /* =========================
           ROAD SIGNS
        ========================= */

        .signs-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;
        }


        .sign-card {
            border: 1px solid #39545a;

            padding: 25px;

            background: #1d3035;

            text-align: center;
        }


        .sign-card img {
            width: 130px;

            height: 130px;

            object-fit: contain;

            background: white;

            margin-bottom: 20px;
        }


        .sign-card h3 {
            color: white;

            font-size: 18px;

            margin-bottom: 10px;
        }


        .sign-card p {
            color: #c4d0d1;

            font-size: 13px;

            line-height: 1.6;
        }


        /* =========================
           OFFENCES
        ========================= */

        .offences-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 18px;
        }


        .offence-card {
            border: 1px solid #dfe5e5;

            padding: 28px;

            background: #ffffff;
        }


        .offence-number {
            color: #879496;

            font-size: 11px;

            letter-spacing: 2px;

            margin-bottom: 25px;
        }


        .offence-card h3 {
            font-size: 19px;

            margin-bottom: 12px;
        }


        .offence-card p {
            color: #687577;

            font-size: 13px;

            line-height: 1.7;

            margin-bottom: 15px;
        }


        .offence-section {
            display: inline-block;

            color: #477b78;

            font-size: 11px;

            font-weight: bold;
        }


        /* =========================
           FAQ
        ========================= */

        .faq-container {
            max-width: 900px;
        }


        .faq-item {
            border-bottom: 1px solid #dfe5e5;

            padding: 22px 0;
        }


        .faq-question {
            font-size: 17px;

            font-weight: bold;

            margin-bottom: 10px;
        }


        .faq-answer {
            color: #687577;

            font-size: 14px;

            line-height: 1.7;
        }


        /* =========================
           FINAL MESSAGE
        ========================= */

        .final-message {
            background: #17252A;

            color: white;

            text-align: center;

            padding: 90px 10%;
        }


        .final-message .label {
            color: #9edbd4;

            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            margin-bottom: 20px;
        }


        .final-message h2 {
            font-size: 42px;

            line-height: 1.2;

            margin-bottom: 20px;
        }


        .final-message p {
            color: #c5d0d1;

            max-width: 650px;

            margin: auto;

            line-height: 1.7;

            font-size: 15px;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #101c20;

            color: #aebbbb;

            padding: 30px 10%;

            display: flex;

            justify-content: space-between;

            align-items: center;

            font-size: 12px;
        }


        .footer-title {
            color: white;

            font-weight: bold;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {

            .rules-grid,
            .signs-grid {
                grid-template-columns: repeat(2, 1fr);
            }


            .offences-grid {
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
                min-height: 650px;

                background-position: 65% center;
            }


            .hero-content {
                width: 90%;

                margin-left: 8%;
            }


            .hero h1 {
                font-size: 48px;
            }


            .rules-grid,
            .signs-grid,
            .offences-grid {
                grid-template-columns: 1fr;
            }


            .intro {
                width: 90%;
            }


            .content-section {
                padding: 60px 8%;
            }


            footer {
                display: block;

                text-align: center;
            }


            .footer-title {
                margin-bottom: 8px;
            }

        }


        @media (max-width: 550px) {

            .hero h1 {
                font-size: 40px;
            }


            .hero-content {
                margin-left: 6%;
            }


            .sign-card img {
                width: 110px;

                height: 110px;
            }


            .final-message h2 {
                font-size: 34px;
            }

        }

    </style>

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<header class="navbar">

    <div class="logo">

        Traffic Rules

        <span>
            at Your Fingertips
        </span>

    </div>


    <nav class="nav-links">

        <a href="../index.php">
            Home
        </a>

        <a href="traffic_rules.php">
            Rules
        </a>

        <a href="offences.php">
            Fines
        </a>

        <a href="road_signs.php">
            Traffic Signs
        </a>

        <a href="faqs.php">
            FAQs
        </a>

    </nav>

</header>



<!-- =========================
     HERO
========================= -->

<section class="hero">


    <div class="hero-content">


        <div class="eyebrow">
            New Driver Guide
        </div>


        <h1>

            Start with the basics.<br>

            <span>Drive with confidence.</span>

        </h1>


        <p>

            A simple guide for new drivers to understand
            essential traffic rules, road signs, common
            offences and safe driving practices.

        </p>


        <a
            href="#rules"
            class="hero-button"
        >
            START LEARNING →
        </a>


    </div>


</section>



<!-- =========================
     INTRO
========================= -->

<section class="intro">


    <div class="intro-label">
        Before You Drive
    </div>


    <h2>
        The basics every new driver should know.
    </h2>


    <p>

        Getting a driving licence is only the beginning.
        Understanding traffic rules and developing safe
        driving habits are important parts of becoming
        a responsible road user.

    </p>


</section>



<!-- =========================
     TRAFFIC RULES
========================= -->

<section
    class="content-section"
    id="rules"
>


    <div class="section-heading">

        <div class="number">
            01 — ESSENTIAL RULES
        </div>


        <h2>
            Know the rules.
        </h2>


        <p>
            Start by understanding some of the most
            important rules you will encounter on the road.
        </p>

    </div>



    <div class="rules-grid">


        <?php

        $rule_count = 1;

        while ($rule = mysqli_fetch_assoc($rules_result)):

        ?>

            <div class="rule-card">


                <div class="rule-number">

                    <?php

                    echo str_pad(
                        $rule_count,
                        2,
                        "0",
                        STR_PAD_LEFT
                    );

                    ?>

                </div>


                <h3>

                    <?php
                    echo htmlspecialchars(
                        $rule["title"]
                    );
                    ?>

                </h3>


                <p>

                    <?php
                    echo htmlspecialchars(
                        $rule["description"]
                    );
                    ?>

                </p>


                <?php if (!empty($rule["applicable_to"])): ?>

                    <div class="rule-meta">

                        Applies to:
                        <?php
                        echo htmlspecialchars(
                            $rule["applicable_to"]
                        );
                        ?>

                    </div>

                <?php endif; ?>


            </div>


        <?php

        $rule_count++;

        endwhile;

        ?>


    </div>


</section>



<!-- =========================
     ROAD SIGNS
========================= -->

<section class="content-section dark">


    <div class="section-heading">

        <div class="number">
            02 — ROAD SIGNS
        </div>


        <h2>
            Learn to read the road.
        </h2>


        <p>
            Recognising traffic signs helps you understand
            what is required and what to expect ahead.
        </p>

    </div>



    <div class="signs-grid">


        <?php

        $sign_count = 1;

        while ($sign = mysqli_fetch_assoc($signs_result)):

            $image_path =
                "../images/" .
                $sign["image"];

        ?>


            <div class="sign-card">


                <?php if (
                    !empty($sign["image"]) &&
                    file_exists($image_path)
                ): ?>

                    <img
                        src="<?php echo htmlspecialchars($image_path); ?>"
                        alt="<?php echo htmlspecialchars($sign["sign_name"]); ?>"
                    >

                <?php endif; ?>


                <h3>

                    <?php
                    echo htmlspecialchars(
                        $sign["sign_name"]
                    );
                    ?>

                </h3>


                <p>

                    <?php
                    echo htmlspecialchars(
                        $sign["meaning"]
                    );
                    ?>

                </p>


            </div>


        <?php

        $sign_count++;

        endwhile;

        ?>


    </div>


</section>



<!-- =========================
     COMMON OFFENCES
========================= -->

<section class="content-section">


    <div class="section-heading">

        <div class="number">
            03 — COMMON OFFENCES
        </div>


        <h2>
            Know what to avoid.
        </h2>


        <p>
            Understanding common offences can help new
            drivers avoid mistakes and drive responsibly.
        </p>

    </div>



    <div class="offences-grid">


        <?php

        $offence_count = 1;

        while (
            $offence =
            mysqli_fetch_assoc($offences_result)
        ):

        ?>


            <div class="offence-card">


                <div class="offence-number">

                    <?php

                    echo str_pad(
                        $offence_count,
                        2,
                        "0",
                        STR_PAD_LEFT
                    );

                    ?>

                </div>


                <h3>

                    <?php
                    echo htmlspecialchars(
                        $offence["offence_name"]
                    );
                    ?>

                </h3>


                <p>

                    <?php
                    echo htmlspecialchars(
                        $offence["description"]
                    );
                    ?>

                </p>


                <?php if (!empty($offence["legal_reference"])): ?>

                    <span class="offence-section">

                        <?php
                        echo htmlspecialchars(
                            $offence["legal_reference"]
                        );
                        ?>

                    </span>

                <?php endif; ?>


            </div>


        <?php

        $offence_count++;

        endwhile;

        ?>


    </div>


</section>



<!-- =========================
     FAQ
========================= -->

<section class="content-section dark">


    <div class="section-heading">

        <div class="number">
            04 — QUICK ANSWERS
        </div>


        <h2>
            Questions new drivers ask.
        </h2>


        <p>
            A few quick answers to help you get started.
        </p>

    </div>



    <div class="faq-container">


        <?php

        while (
            $faq =
            mysqli_fetch_assoc($faqs_result)
        ):

        ?>


            <div class="faq-item">


                <div class="faq-question">

                    <?php
                    echo htmlspecialchars(
                        $faq["question"]
                    );
                    ?>

                </div>


                <div class="faq-answer">

                    <?php
                    echo htmlspecialchars(
                        $faq["answer"]
                    );
                    ?>

                </div>


            </div>


        <?php

        endwhile;

        ?>


    </div>


</section>



<!-- =========================
     FINAL MESSAGE
========================= -->

<section class="final-message">


    <div class="label">
        Your Journey Starts Here
    </div>


    <h2>
        Learn. Practice. Drive responsibly.
    </h2>


    <p>

        Good driving is not just about knowing how to
        operate a vehicle. It is about understanding
        the road, respecting others and making safe
        decisions every day.

    </p>


</section>



<!-- =========================
     FOOTER
========================= -->

<footer>


    <div class="footer-title">
        Traffic Rules at Your Fingertips
    </div>


    <div>
        © 2026 Traffic Rules Information System
    </div>


</footer>


</body>

</html>