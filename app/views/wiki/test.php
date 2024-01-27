<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: black;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: black;
            color: white;
            padding: 10px;
            text-align: center;
        }

        section {
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .stats-card {
            background-color: pink;
            color: black;
            border: 1px solid black;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            color: black;
        }
    </style>
</head>
<body>

    <header>
        <h1>Website Statistics</h1>
    </header>

    <section class="container">
        <div class="stats-card" id="totalWikisCard">
            <h2>Total Wikis</h2>
            <p><?php echo $Stats['wiki']->getWikiStats(); ?></p>
        </div>

        <div class="stats-card" id="totalTagsCard">
            <h2>Total Tags</h2>
            <p><?php echo $Stats['tag']->getAllTags(); ?></p>
        </div>

        <div class="stats-card" id="totalCategoriesCard">
            <h2>Total Categories</h2>
            <p><?php echo $Stats['category']->getCategoryStats(); ?></p>
        </div>
    </section>

</body>
</html>
