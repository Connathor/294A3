<!DOCTYPE HTML>
<html>
    <body>
        <?php
        
            $select = $_POST["select"];
            $title = $_POST["title"] != "" ? $_POST["title"] : "null";
            $author = $_POST["author"] != "" ? $_POST["author"] : "null";
            $publisher = $_POST["publisher"] != "" ? $_POST["publisher"] : "null";
            $year = $_POST["year"] != "" ? $_POST["year"] : "null";
            $isbn = $_POST["isbn"] != "" ? $_POST["isbn"] : "null";

            $data = "./database";
            if($title=="null"&&$author=="null"&&$publisher=="null"&&$year=="null"&&$isbn=="null"){
                echo "<h1>Your must insert in data for at least 1 field!</h1><br><form action=\"http://ck.csit.selu.edu/~raiford/PHPtest/letsphp.php\"><input type=\"submit\" value=\"Home\"></form>";
            }
            else{
                if($select=="addnew"){
                    echo "You chose to add a new book to the database!";
                    $data2 = fopen($data, 'a') or die("<br>Unable to open file!");
                    $string = "$author%$title%$isbn%$publisher%$year\n";
                    fwrite($data2,$string);
                    fclose($data);
                    echo "<br>Added a book!<br><form action=\"http://ck.csit.selu.edu/~raiford/PHPtest/letsphp.php\"><input type=\"submit\" value=\"Home\"></form>";
                }

                elseif($select=="delete"){
                    $lines = file("./database");
                    foreach($lines as $linenum => $line){
                        $arr = explode("%",$line);
                        if(strcasecmp($arr[0],($author != "null") ? $author : $arr[0]) == 0
                           && strcasecmp($arr[1],($title != "null") ? $title : $arr[1]) == 0
                           && strcasecmp($arr[2],($isbn != "null") ? $isbn : $arr[2]) == 0
                           && strcasecmp($arr[3],($publisher != "null") ? $publisher : $arr[3]) == 0
                           && strcasecmp($arr[4],($year != "null") ? $year : $arr[4]) == 0){
                            unset($lines[$linenum]);
                        }
                    }
                    file_put_contents($data,implode("",$lines));
                    echo "You have deleted that book from the database, unless it did not exist!<br><form action=\"http://ck.csit.selu.edu/~raiford/PHPtest/letsphp.php\"><input type=\"submit\" value=\"Home\"></form>";

                }
                
                
                                elseif($select=="search"){
                    $lines = file("./database");
                    $results ="";
                    foreach($lines as $linenum => $line){
                        $arr = explode("%",$line);
                        if(strcasecmp($arr[0],($author != "null") ? $author : $arr[0]) == 0
                           && strcasecmp($arr[1],($title != "null") ? $title : $arr[1]) == 0
                           && strcasecmp($arr[2],($isbn != "null") ? $isbn : $arr[2]) == 0
                           && strcasecmp($arr[3],($publisher != "null") ? $publisher : $arr[3]) == 0
                           && strcasecmp($arr[4],($year != "null") ? $year : $arr[4]) == 0){
                            $results= $results . $line ."<br>";
                        }
                    }
                    echo "Here are your results!<br><br>";
                    echo $results;
                    echo "Thats all! Nothing here? try again!<br><br><form action=\"http://ck.csit.selu.edu/~raiford/PHPtest/letsphp.php\"><input type=\"submit\" value=\"Home\"></form>";

                }
            }
            
        ?>
    </body>
</html>