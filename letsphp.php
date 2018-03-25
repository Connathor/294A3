<!DOCTYPE HTML>
<html>
    <body>
        <center>
            <div style="width: 50%;">
                <center>
                    <form action="./letsphp2.php" method="post">

                        <h1>Book Inventory Management</h1><br>
                        <hr>
                            Select operation:
                            <select name="select">
                              <option value="addnew">Add New</option>
                              <option value="delete">Delete</option>
                              <option value="search">Search</option>
                            </select>  <br>
                        <hr>
                        <h1>Book Fields</h1>
                            <table>
                                <tr>
                                    <td style="text-align: right">
                                        Title:
                                    </td>
                                    <td>
                                        <input type="text" name="title">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right">
                                        Author:
                                    </td>
                                    <td>
                                        <input type="text" name="author">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right">
                                        ISBN:
                                    </td>
                                    <td>
                                        <input type="text" name="isbn">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right">
                                        Publisher:
                                    </td>
                                    <td>
                                        <input type="text" name="publisher">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right">
                                        Year:
                                    </td>
                                    <td>
                                        <input type="text" name="year">
                                    </td>
                                </tr>
                            </table>
                          <input type="submit" value="Do it!">
                        <hr>
                        Database contents<br>
                        <?php
                            $lines = file("./database"); // Read the contents of myFile as an array. Creates array "$lines"
                            foreach ($lines as $line_num => $line) {
                                echo "Line #<b>{$line_num}</b> : $line <br>\n";
                            }
                        ?>
            
                        <br><br>
                    </form> 
                </center>
            </div>
        </center>
    </body>
</html>