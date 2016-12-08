<!DOCTYPE html>
<head>
    <title>Health and Wellbeing</title>
    <link rel="stylesheet" type="text/css" href="../src/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/general.css"/>
    <link rel="stylesheet" type="text/css" href="../src/css/health_wellbeing.css"/>

    <!-- Connect database -->
    <?php include('scripts/db_connect_test.php') ?>
</head>
<body>

<?php include('scripts/navbar.php'); ?>

<div class="banner">
    <img src="/src/images/go-portlethen.jpg"/>

</div>

<!-- Container for health and wellbeing content -->
<div id="healthWellbeing">

    <h1 id="pageHeader">Health and Wellbeing</h1>

    <!-- Static information about health and wellbeing -->
    <div id="staticHealthSection">
        <h1 class="sectionHeader">Health and Wellbeing information</h1>
        <!-- Container for a static information article -->
        <div class="staticInfoContainer">
            <!-- Header for a static information article -->
            <h1 class="staticInfoHeader">
                Bacon Is Good For You
            </h1>
            Spicy jalapeno bacon ipsum dolor amet ham doner labore dolor veniam flank tempor. Deserunt burgdoggen ad
            porchetta sunt pastrami boudin sed magna corned beef nisi. Lorem pastrami ullamco jerky tongue officia
            laborum
            in tempor beef ribs magna turkey. Lorem dolore incididunt, leberkas filet mignon swine shank.

            Flank deserunt doner, velit t-bone landjaeger leberkas. Doner veniam strip steak, est turkey tempor proident
            sint pork loin andouille voluptate. Tenderloin shoulder nulla burgdoggen ground round reprehenderit boudin
            mollit cupim pancetta tri-tip consectetur filet mignon salami in. Kielbasa in ground round frankfurter.
            Shankle
            aliquip doner, brisket in enim pork chop.

            Strip steak beef ribs lorem aliqua leberkas short ribs commodo proident pork chop tenderloin esse laborum
            ex.
            Salami frankfurter alcatra duis. Ex beef nulla proident eu dolore tenderloin beef ribs shank nostrud anim
            turkey. Bacon fatback shank velit, ex proident tri-tip minim. Turkey cupim exercitation ut. Chuck spare ribs
            aute excepteur id esse turducken proident short ribs cow commodo nostrud ham frankfurter ut.
        </div>
        <div class="staticInfoContainer">
            <!-- Header for a static information article -->
            <h1 class="staticInfoHeader">
                Annual Bacon Eating Contest 2016
            </h1>
            Spicy jalapeno bacon ipsum dolor amet ham doner labore dolor veniam flank tempor. Deserunt burgdoggen ad
            porchetta sunt pastrami boudin sed magna corned beef nisi. Lorem pastrami ullamco jerky tongue officia
            laborum
            in tempor beef ribs magna turkey. Lorem dolore incididunt, leberkas filet mignon swine shank.

            Flank deserunt doner, velit t-bone landjaeger leberkas. Doner veniam strip steak, est turkey tempor proident
            sint pork loin andouille voluptate. Tenderloin shoulder nulla burgdoggen ground round reprehenderit boudin
            mollit cupim pancetta tri-tip consectetur filet mignon salami in. Kielbasa in ground round frankfurter.
            Shankle
            aliquip doner, brisket in enim pork chop.

            Strip steak beef ribs lorem aliqua leberkas short ribs commodo proident pork chop tenderloin esse laborum
            ex.
            Salami frankfurter alcatra duis. Ex beef nulla proident eu dolore tenderloin beef ribs shank nostrud anim
            turkey. Bacon fatback shank velit, ex proident tri-tip minim. Turkey cupim exercitation ut. Chuck spare ribs
            aute excepteur id esse turducken proident short ribs cow commodo nostrud ham frankfurter ut.
        </div>
    </div>

    <!-- Dynamic news section that pulls news articles from the database -->
    <div id="dynamicNewsSection">

        <h1 class="sectionHeader">News</h1>

        <?php
        $sql = "SELECT News.news_id, News.title, News.content, News.date FROM News";
        $result = $db->query($sql);

        while ($row = $result->fetch_array()) {
            echo("
            <!-- Container for a single news article -->
            <div class='dynamicNewsContainer'>
                <!-- Get header for a single news article -->
                <h1 class='dynamicNewsTitle'><a href='news/{$row['news_id']}'>{$row['title']}</a></h1>
                <div class='newsContent'>{$row['content']}</div>
                <div class='newsDate'>{$row['date']}</div>
            </div>
			");
        }
        ?>

    </div>

    <!-- Dynamic events section that pulls events from the database -->
    <div id="dynamicEventsSection">

        <h1 class="sectionHeader">Events</h1>

        <?php
        $sql = "SELECT Event.event_id, Event.name, Event.description, Event.date FROM Event WHERE Event.date > DATEADD(week, -1, NOW());";
        $result = $db->query($sql);

        while ($row = $result->fetch_array()) {

                echo("
            <!-- Container for a single event -->
            <div class='dynamicEventContainer'>
                <!-- Get header for a single event -->
                <h1 class='dynamicEventName'><a href='event/{$row['event_id']}'>{$row['name']}</a></h1>
                <div class='eventDescription'>{$row['description']}</div>
                <div class='eventDate'>{$row['date']}</div>
            </div>
			");
        }
        ?>

    </div>

</div>

</body>