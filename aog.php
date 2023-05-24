<html>
    <head>
        <title> Filtered Waifus </title>
    </head>
    <body style = "background-color:aliceblue;">
        <?php

        $link = mysqli_connect("DESKTOP-AEVM3V7", "TOPG", "ABC", "waifu");
        if (!$link){
            echo "MySQL Error Code";
        }
        $given_name = $_POST["Name"];
        $query = "SELECT specific_waifu.NAME, specific_waifu.AGE, specific_waifu.LINK
                  FROM specific_waifu, anime_or_game
                  WHERE anime_or_game.AGNAME = specific_waifu.ORIGIN AND 
                        specific_waifu.ORIGIN = $given_name";
        $result = $link->query($query);
        $nor = $result->num_rows;
        
        echo "Selected Anime/Game: ", $given_name, "<br>";
        echo "---------------------------------------------", "<br>";

        for ($i = 0 ; $i != $nor ; $i++){
            $row = $result->fetch_assoc();
            echo "Name: ", $row["NAME"], "<br>";
            echo "Age: ", $row["AGE"], "<br>";
            echo "Link: ", $row["LINK"], "<br>";
            echo "---------------------------------------------", "<br>";
        }

        $result->free_result();
        $link->close();

        ?>

        <P style = "color:aqua;">
            Press the "Return to homepage" button to return to the homepage!
        </p>
        <form action = "file:///C:/Users/nayar/Desktop/Waifu%20Website/index.html">
            <button type ="submit"> Return to the homepage </button>
        </form>
    <body>
<html>