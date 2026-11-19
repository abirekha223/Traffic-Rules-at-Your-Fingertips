<?php

require_once "../config/database.php";

$sql = "SELECT * FROM faqs ORDER BY faq_id";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FAQs | Traffic Rules at Your Fingertips</title>

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
            width: 80%;
            max-width: 1000px;
            margin: 70px auto;
        }

        .section-heading {
            margin-bottom: 35px;
        }

        .section-heading h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .section-heading p {
            color: #697577;
            font-size: 14px;
        }

        /* FAQ */

        .faq-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .faq-item {
            background: white;
            border: 1px solid #e0e5e5;
        }

        .faq-question {
            width: 100%;
            border: none;
            background: white;
            padding: 24px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: left;
            cursor: pointer;
            color: #17252A;
            font-size: 16px;
            font-weight: bold;
        }

        .faq-question:hover {
            background: #f8fafa;
        }

        .faq-icon {
            font-size: 24px;
            font-weight: normal;
            margin-left: 20px;
        }

        .faq-answer {
            display: none;
            padding: 0 25px 25px;
            color: #596668;
            font-size: 14px;
            line-height: 1.7;
        }

        .faq-category {
            display: inline-block;
            margin-top: 10px;
            margin-bottom: 12px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #477b78;
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

        .no-faqs {
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
        Need To Know?
    </div>

    <h1>
        Frequently Asked<br>
        Questions.
    </h1>

    <p>
        Find simple answers to common questions about traffic
        rules, road safety, driving responsibilities and offences.
    </p>

</section>


<!-- FAQ CONTENT -->

<main class="container">

    <div class="section-heading">

        <h2>
            Common Questions
        </h2>

        <p>
            <?php echo mysqli_num_rows($result); ?> questions available
        </p>

    </div>


    <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="faq-list">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="faq-item">

                    <button
                        class="faq-question"
                        onclick="toggleFAQ(<?php echo $row['faq_id']; ?>)"
                    >

                        <span>
                            <?php echo htmlspecialchars($row["question"]); ?>
                        </span>

                        <span
                            class="faq-icon"
                            id="icon-<?php echo $row['faq_id']; ?>"
                        >
                            +
                        </span>

                    </button>


                    <div
                        class="faq-answer"
                        id="answer-<?php echo $row['faq_id']; ?>"
                    >

                        <div class="faq-category">
                            <?php echo htmlspecialchars($row["category"]); ?>
                        </div>

                        <p>
                            <?php echo htmlspecialchars($row["answer"]); ?>
                        </p>

                        <div class="source">

                            <a
                                href="<?php echo htmlspecialchars($row["source"], ENT_QUOTES, "UTF-8"); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                OFFICIAL SOURCE ↗
                            </a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    <?php } else { ?>

        <div class="no-faqs">

            No FAQs are available at the moment.

        </div>

    <?php } ?>

</main>


<!-- FOOTER -->

<footer>

    Traffic Rules at Your Fingertips © 2026

</footer>


<script>

function toggleFAQ(id) {

    const answer = document.getElementById("answer-" + id);
    const icon = document.getElementById("icon-" + id);

    if (answer.style.display === "block") {

        answer.style.display = "none";
        icon.textContent = "+";

    } else {

        answer.style.display = "block";
        icon.textContent = "−";

    }

}

</script>


</body>

</html>