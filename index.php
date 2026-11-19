<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Traffic Rules at Your Fingertips</title>

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
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;

            background: transparent;
            padding: 28px 5%;

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
            min-height: 730px;

            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;

            color: white;

            background-image:
                linear-gradient(
                    90deg,
                    rgba(10, 27, 32, 0.98) 0%,
                    rgba(10, 27, 32, 0.90) 30%,
                    rgba(10, 27, 32, 0.55) 55%,
                    rgba(10, 27, 32, 0.15) 100%
                ),
                url("images/hero-road.png");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        .hero-content {
            width: 55%;
            max-width: 760px;

            margin-left: 8%;

            padding-top: 50px;

            position: relative;
            z-index: 2;
        }


        .eyebrow {
            font-size: 12px;
            letter-spacing: 4px;

            color: #9edbd4;

            text-transform: uppercase;

            margin-bottom: 22px;
        }


        .hero h1 {
            font-size: 68px;
            line-height: 1;

            margin-bottom: 28px;

            letter-spacing: -2px;
        }


        .hero h1 span {
            color: #9edbd4;
        }


        .hero p {
            max-width: 650px;

            color: #d5dddd;

            font-size: 17px;
            line-height: 1.8;

            margin-bottom: 25px;
        }


        /* =========================
           SEARCH
        ========================= */

        .home-search {
            display: flex;

            width: 100%;
            max-width: 620px;

            margin-bottom: 25px;
        }


        .home-search input {
            flex: 1;

            padding: 15px 18px;

            border: none;

            background: white;

            color: #17252A;

            font-size: 14px;

            outline: none;
        }


        .home-search input::placeholder {
            color: #7b8788;
        }


        .home-search button {
            padding: 15px 25px;

            border: none;

            background: #9edbd4;

            color: #17252A;

            font-size: 13px;

            font-weight: bold;

            letter-spacing: 1px;

            cursor: pointer;
        }


        .home-search button:hover {
            background: white;
        }


        /* =========================
           HERO BUTTONS
        ========================= */

        .hero-buttons {
            display: flex;

            gap: 15px;

            flex-wrap: wrap;
        }


        .primary-button {
            display: inline-block;

            background: #9edbd4;

            color: #17252A;

            padding: 15px 25px;

            text-decoration: none;

            font-size: 13px;

            font-weight: bold;

            letter-spacing: 1px;
        }


        .primary-button:hover {
            background: white;
        }


        .secondary-button {
            display: inline-block;

            border: 1px solid rgba(255, 255, 255, 0.6);

            color: white;

            padding: 15px 25px;

            text-decoration: none;

            font-size: 13px;

            font-weight: bold;

            letter-spacing: 1px;

            background: rgba(23, 37, 42, 0.2);
        }


        .secondary-button:hover {
            background: white;

            color: #17252A;
        }


        /* =========================
           INTRO
        ========================= */

        .intro {
            width: 85%;
            max-width: 1200px;

            margin: 80px auto;
        }


        .intro-grid {
            display: grid;

            grid-template-columns: 1fr 1.5fr;

            gap: 70px;

            align-items: start;
        }


        .intro-label {
            color: #477b78;

            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            margin-bottom: 15px;
        }


        .intro h2 {
            font-size: 40px;

            line-height: 1.15;
        }


        .intro-text {
            color: #596668;

            font-size: 16px;

            line-height: 1.8;
        }


        /* =========================
           NEW DRIVERS
        ========================= */

        .new-drivers {
            width: 85%;
            max-width: 1200px;

            margin: 0 auto 80px;

            padding: 40px 45px;

            background: #17252A;

            color: white;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 30px;
        }


        .new-drivers-content {
            max-width: 750px;
        }


        .new-drivers-label {
            color: #9edbd4;

            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            margin-bottom: 10px;
        }


        .new-drivers h2 {
            font-size: 30px;

            margin-bottom: 10px;
        }


        .new-drivers p {
            color: #c7d2d3;

            font-size: 14px;

            line-height: 1.6;

            max-width: 650px;
        }


        .new-drivers-button {
            display: inline-block;

            background: #9edbd4;

            color: #17252A;

            padding: 15px 25px;

            text-decoration: none;

            font-size: 12px;

            font-weight: bold;

            letter-spacing: 1px;

            white-space: nowrap;
        }


        .new-drivers-button:hover {
            background: white;
        }


        /* =========================
           FEATURES
        ========================= */

        .features {
            background: white;

            padding: 80px 8%;
        }


        .section-top {
            display: flex;

            justify-content: space-between;

            align-items: end;

            margin-bottom: 40px;
        }


        .section-top h2 {
            font-size: 35px;
        }


        .section-top p {
            color: #697577;

            font-size: 14px;
        }


        .feature-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;
        }


        .feature-card {
            border: 1px solid #dfe5e5;

            padding: 30px;

            text-decoration: none;

            color: #17252A;

            min-height: 230px;

            transition: 0.25s;
        }


        .feature-card:hover {
            transform: translateY(-5px);

            border-color: #17252A;
        }


        .feature-number {
            color: #879496;

            font-size: 12px;

            letter-spacing: 2px;

            margin-bottom: 35px;
        }


        .feature-card h3 {
            font-size: 21px;

            margin-bottom: 12px;
        }


        .feature-card p {
            color: #687577;

            font-size: 13px;

            line-height: 1.6;
        }


        .feature-arrow {
            display: block;

            margin-top: 20px;

            font-weight: bold;

            font-size: 12px;
        }


        /* =========================
           SAFETY MESSAGE
        ========================= */

        .message {
            background: #17252A;

            color: white;

            padding: 90px 10%;

            text-align: center;
        }


        .message-label {
            color: #9edbd4;

            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            margin-bottom: 20px;
        }


        .message h2 {
            font-size: 48px;

            max-width: 800px;

            margin: auto;

            line-height: 1.15;
        }


        .message p {
            color: #c7d2d3;

            margin: 25px auto 0;

            max-width: 600px;

            line-height: 1.7;
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

            .hero-content {
                width: 60%;
            }

            .hero h1 {
                font-size: 55px;
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 1000px) {

            .intro-grid {
                grid-template-columns: 1fr;

                gap: 30px;
            }

        }


        @media (max-width: 800px) {

            .navbar {
                position: absolute;

                padding: 18px 25px;

                flex-direction: column;

                gap: 18px;

                align-items: center;
            }


            .nav-links {
                gap: 15px;

                flex-wrap: wrap;

                justify-content: center;
            }


            .hero {
                min-height: 800px;

                padding: 150px 8% 70px;

                background-position: 65% center;
            }


            .hero-content {
                width: 100%;

                margin-left: 0;

                max-width: 700px;
            }


            .hero h1 {
                font-size: 48px;
            }


            .intro {
                width: 90%;
            }


            .features {
                padding: 60px 8%;
            }


            .section-top {
                display: block;
            }


            .section-top p {
                margin-top: 10px;
            }


            .new-drivers {
                width: 90%;

                display: block;

                padding: 35px 30px;
            }


            .new-drivers-button {
                margin-top: 20px;
            }


            .message h2 {
                font-size: 38px;
            }

        }


        @media (max-width: 550px) {

            .feature-grid {
                grid-template-columns: 1fr;
            }


            .hero {
                background-position: 65% center;
            }


            .hero h1 {
                font-size: 40px;
            }


            .home-search {
                display: block;
            }


            .home-search input {
                width: 100%;
            }


            .home-search button {
                width: 100%;

                margin-top: 8px;
            }


            .hero-buttons {
                display: block;
            }


            .primary-button,
            .secondary-button {
                width: 100%;

                text-align: center;

                margin-bottom: 10px;
            }


            footer {
                display: block;

                text-align: center;
            }


            .footer-title {
                margin-bottom: 8px;
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

        <a href="index.php">
            Home
        </a>

        <a href="pages/traffic_rules.php">
            Rules
        </a>

        <a href="pages/offences.php">
            Fines
        </a>

        <a href="pages/road_signs.php">
            Traffic Signs
        </a>

        <a href="pages/faqs.php">
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
            Maharashtra Traffic Information
        </div>


        <h1>

            Know the rules.<br>

            <span>
                Drive safer.
            </span>

        </h1>


        <p>

            A simple and accessible information system
            designed to help citizens understand traffic
            rules, offences, penalties and road signs.

        </p>


        <!-- SEARCH -->

        <form
            class="home-search"
            action="search.php"
            method="GET"
        >

            <input
                type="text"
                name="q"
                placeholder="Search rules, fines, signs or FAQs..."
                required
            >


            <button type="submit">
                SEARCH
            </button>

        </form>


        <!-- HERO BUTTONS -->

        <div class="hero-buttons">


            <a
                href="pages/traffic_rules.php"
                class="primary-button"
            >
                EXPLORE TRAFFIC RULES →
            </a>


            <a
                href="pages/road_signs.php"
                class="secondary-button"
            >
                READ ROAD SIGNS
            </a>


        </div>


    </div>


</section>



<!-- =========================
     INTRODUCTION
========================= -->

<section class="intro">


    <div class="intro-grid">


        <div>


            <div class="intro-label">
                Why This Website?
            </div>


            <h2>
                Traffic information should be easy to understand.
            </h2>


        </div>


        <div class="intro-text">


            <p>

                Traffic rules are an important part of
                everyday road safety. However, information
                about rules, offences and road signs can
                sometimes be difficult for ordinary citizens
                to find and understand.

            </p>


            <br>


            <p>

                This website brings essential traffic
                information together in one place, using
                simple explanations that can be easily
                understood by drivers, riders and pedestrians.

            </p>


        </div>


    </div>


</section>



<!-- =========================
     NEW DRIVERS
========================= -->

<section class="new-drivers">


    <div class="new-drivers-content">


        <div class="new-drivers-label">
            New to Driving?
        </div>


        <h2>
            Start with the basics.
        </h2>


        <p>

            Learn essential traffic rules, road signs and
            safe driving habits with our simple guide for
            new drivers.

        </p>


    </div>


    <a
        href="pages/new_drivers.php"
        class="new-drivers-button"
    >
        START HERE →
    </a>


</section>



<!-- =========================
     FEATURES
========================= -->

<section class="features">


    <div class="section-top">


        <div>


            <div class="intro-label">
                Explore
            </div>


            <h2>
                Everything you need.
            </h2>


        </div>


        <p>
            Four sections. One safer journey.
        </p>


    </div>



    <div class="feature-grid">


        <!-- TRAFFIC RULES -->

        <a
            href="pages/traffic_rules.php"
            class="feature-card"
        >

            <div class="feature-number">
                01
            </div>


            <h3>
                Traffic Rules
            </h3>


            <p>

                Learn important traffic rules and
                responsible road practices.

            </p>


            <span class="feature-arrow">
                VIEW RULES →
            </span>


        </a>



        <!-- FINES -->

        <a
            href="pages/offences.php"
            class="feature-card"
        >

            <div class="feature-number">
                02
            </div>


            <h3>
                Fines & Penalties
            </h3>


            <p>

                Understand common traffic offences,
                penalties and legal references.

            </p>


            <span class="feature-arrow">
                VIEW FINES →
            </span>


        </a>



        <!-- ROAD SIGNS -->

        <a
            href="pages/road_signs.php"
            class="feature-card"
        >

            <div class="feature-number">
                03
            </div>


            <h3>
                Road Signs
            </h3>


            <p>

                Identify road signs and understand
                what action each sign requires.

            </p>


            <span class="feature-arrow">
                VIEW SIGNS →
            </span>


        </a>



        <!-- FAQ -->

        <a
            href="pages/faqs.php"
            class="feature-card"
        >

            <div class="feature-number">
                04
            </div>


            <h3>
                FAQs
            </h3>


            <p>

                Find simple answers to common
                traffic-related questions.

            </p>


            <span class="feature-arrow">
                VIEW FAQs →
            </span>


        </a>


    </div>


</section>



<!-- =========================
     SAFETY MESSAGE
========================= -->

<section class="message">


    <div class="message-label">
        Road Safety
    </div>


    <h2>

        Discipline Today,<br>
        Safer Tomorrow.

    </h2>


    <p>

        Following traffic rules is not only about
        avoiding penalties. It is about protecting
        yourself and everyone who shares the road
        with you.

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