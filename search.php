<?php
require_once "config/database.php";

$search = isset($_GET["q"]) ? trim($_GET["q"]) : "";

$traffic_rules = [];
$offences = [];
$road_signs = [];
$faqs = [];

if ($search !== "") {

    $keyword = "%" . $search . "%";

    /* TRAFFIC RULES */
    $sql = "SELECT * FROM traffic_rules
            WHERE title LIKE ?
            OR description LIKE ?
            OR category LIKE ?
            OR applicable_to LIKE ?
            ORDER BY rule_id";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $keyword, $keyword, $keyword, $keyword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $traffic_rules[] = $row;
    }


    /* OFFENCES */
    $sql = "SELECT * FROM offences
            WHERE offence_name LIKE ?
            OR description LIKE ?
            OR vehicle_type LIKE ?
            OR legal_reference LIKE ?
            OR penalty LIKE ?
            ORDER BY offence_id";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $keyword,
        $keyword,
        $keyword,
        $keyword,
        $keyword
    );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $offences[] = $row;
    }


    /* ROAD SIGNS */
    $sql = "SELECT * FROM road_signs
            WHERE sign_name LIKE ?
            OR category LIKE ?
            OR meaning LIKE ?
            OR action_required LIKE ?
            ORDER BY sign_id";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $keyword, $keyword, $keyword, $keyword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $road_signs[] = $row;
    }


    /* FAQs */
    $sql = "SELECT * FROM faqs
            WHERE question LIKE ?
            OR answer LIKE ?
            OR category LIKE ?
            ORDER BY faq_id";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $keyword, $keyword, $keyword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $faqs[] = $row;
    }
}

$total_results =
    count($traffic_rules) +
    count($offences) +
    count($road_signs) +
    count($faqs);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search | Traffic Rules At Your Fingertips</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f6;
            color: #17252A;
        }

        /* NAVBAR */

        nav {
            background: #17252A;
            padding: 22px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .logo span {
            color: #9ADFD8;
            font-size: 13px;
            margin-left: 5px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 28px;
            font-size: 14px;
        }

        nav a:hover {
            color: #9ADFD8;
        }

        /* SEARCH HEADER */

        .search-header {
            background: #17252A;
            padding: 70px 7% 80px;
            color: white;
        }

        .search-header small {
            color: #9ADFD8;
            letter-spacing: 3px;
            font-size: 11px;
        }

        .search-header h1 {
            font-size: 48px;
            margin: 15px 0 30px;
        }

        .search-box {
            display: flex;
            max-width: 750px;
        }

        .search-box input {
            flex: 1;
            padding: 17px 20px;
            border: none;
            font-size: 16px;
            outline: none;
        }

        .search-box button {
            background: #9ADFD8;
            color: #17252A;
            border: none;
            padding: 0 28px;
            font-weight: bold;
            cursor: pointer;
        }

        /* RESULTS */

        .results {
            width: 86%;
            max-width: 1200px;
            margin: 50px auto;
        }

        .result-count {
            margin-bottom: 30px;
            color: #526267;
        }

        .section-title {
            margin: 40px 0 18px;
            font-size: 25px;
        }

        .result-card {
            background: white;
            padding: 25px;
            margin-bottom: 15px;
            border-left: 4px solid #9ADFD8;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .result-card h3 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        .result-card p {
            color: #526267;
            line-height: 1.7;
            margin-bottom: 8px;
        }

        .result-card strong {
            color: #17252A;
        }

        .source-link {
            display: inline-block;
            margin-top: 12px;
            color: #177e78;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
        }

        .source-link:hover {
            text-decoration: underline;
        }

        .no-results {
            background: white;
            padding: 50px;
            text-align: center;
        }

        .no-results h2 {
            margin-bottom: 10px;
        }

        .no-results p {
            color: #667;
        }

        @media (max-width: 700px) {

            nav {
                flex-direction: column;
                gap: 15px;
            }

            nav a {
                margin: 0 8px;
            }

            .search-header h1 {
                font-size: 36px;
            }

            .search-box {
                flex-direction: column;
            }

            .search-box button {
                padding: 15px;
            }
        }

    </style>
</head>

<body>

<!-- NAVBAR -->

<nav>

    <div class="logo">
        Traffic Rules
        <span>at Your Fingertips</span>
    </div>

    <div>
        <a href="index.php">Home</a>
        <a href="pages/traffic_rules.php">Rules</a>
        <a href="pages/offences.php">Fines</a>
        <a href="pages/road_signs.php">Traffic Signs</a>
        <a href="pages/faqs.php">FAQs</a>
    </div>

</nav>


<!-- SEARCH HEADER -->

<section class="search-header">

    <small>TRAFFIC INFORMATION SEARCH</small>

    <h1>Search Traffic Information.</h1>

    <form class="search-box" method="GET" action="search.php">

        <input
            type="text"
            name="q"
            placeholder="Search rules, fines, signs or FAQs..."
            value="<?php echo htmlspecialchars($search); ?>"
        >

        <button type="submit">SEARCH</button>

    </form>

</section>


<!-- RESULTS -->

<div class="results">

<?php if ($search === ""): ?>

    <div class="no-results">
        <h2>What are you looking for?</h2>
        <p>Search for a traffic rule, offence, road sign or frequently asked question.</p>
    </div>

<?php else: ?>

    <p class="result-count">
        Showing results for:
        <strong>"<?php echo htmlspecialchars($search); ?>"</strong>
        — <?php echo $total_results; ?> result(s)
    </p>


    <!-- TRAFFIC RULES -->

    <?php if (count($traffic_rules) > 0): ?>

        <h2 class="section-title">Traffic Rules</h2>

        <?php foreach ($traffic_rules as $row): ?>

            <div class="result-card">

                <h3>
                    <?php echo htmlspecialchars($row["title"]); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($row["description"]); ?>
                </p>

                <p>
                    <strong>Category:</strong>
                    <?php echo htmlspecialchars($row["category"]); ?>
                </p>

                <p>
                    <strong>Applicable to:</strong>
                    <?php echo htmlspecialchars($row["applicable_to"]); ?>
                </p>

                <?php if (!empty($row["source"])): ?>

                    <a
                        class="source-link"
                        href="<?php echo htmlspecialchars($row["source"]); ?>"
                        target="_blank"
                    >
                        VIEW OFFICIAL SOURCE ↗
                    </a>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>


    <!-- OFFENCES -->

    <?php if (count($offences) > 0): ?>

        <h2 class="section-title">Fines & Penalties</h2>

        <?php foreach ($offences as $row): ?>

            <div class="result-card">

                <h3>
                    <?php echo htmlspecialchars($row["offence_name"]); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($row["description"]); ?>
                </p>

                <p>
                    <strong>Vehicle:</strong>
                    <?php echo htmlspecialchars($row["vehicle_type"]); ?>
                </p>

                <p>
                    <strong>Penalty:</strong>
                    <?php echo htmlspecialchars($row["penalty"]); ?>
                </p>

                <p>
                    <strong>Legal Reference:</strong>
                    <?php echo htmlspecialchars($row["legal_reference"]); ?>
                </p>

                <?php if (!empty($row["source"])): ?>

                    <a
                        class="source-link"
                        href="<?php echo htmlspecialchars($row["source"]); ?>"
                        target="_blank"
                    >
                        VIEW OFFICIAL SOURCE ↗
                    </a>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>


    <!-- ROAD SIGNS -->

    <?php if (count($road_signs) > 0): ?>

        <h2 class="section-title">Road Signs</h2>

        <?php foreach ($road_signs as $row): ?>

            <div class="result-card">

                <h3>
                    <?php echo htmlspecialchars($row["sign_name"]); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($row["meaning"]); ?>
                </p>

                <p>
                    <strong>Category:</strong>
                    <?php echo htmlspecialchars($row["category"]); ?>
                </p>

                <p>
                    <strong>Action:</strong>
                    <?php echo htmlspecialchars($row["action_required"]); ?>
                </p>

                <?php if (!empty($row["source"])): ?>

                    <a
                        class="source-link"
                        href="<?php echo htmlspecialchars($row["source"]); ?>"
                        target="_blank"
                    >
                        VIEW OFFICIAL SOURCE ↗
                    </a>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>


    <!-- FAQs -->

    <?php if (count($faqs) > 0): ?>

        <h2 class="section-title">FAQs</h2>

        <?php foreach ($faqs as $row): ?>

            <div class="result-card">

                <h3>
                    <?php echo htmlspecialchars($row["question"]); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($row["answer"]); ?>
                </p>

                <p>
                    <strong>Category:</strong>
                    <?php echo htmlspecialchars($row["category"]); ?>
                </p>

                <?php if (!empty($row["source"])): ?>

                    <a
                        class="source-link"
                        href="<?php echo htmlspecialchars($row["source"]); ?>"
                        target="_blank"
                    >
                        VIEW OFFICIAL SOURCE ↗
                    </a>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>


    <?php if ($total_results == 0): ?>

        <div class="no-results">

            <h2>No results found</h2>

            <p>
                Try searching for another traffic rule, offence,
                road sign or FAQ.
            </p>

        </div>

    <?php endif; ?>

<?php endif; ?>

</div>

</body>
</html>