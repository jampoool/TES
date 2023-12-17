<?php 
    function studentEvaluationForm(){
        include "../connect.php";
    
        $query = "SELECT
                     tblcategory.categoryName,
                     tblquestion.questionID,
                     tblquestion.description
                 FROM
                     tblquestion
                 INNER JOIN tblcategory ON tblcategory.categoryID = tblquestion.categoryID";
        $sqlquery = mysqli_query($con, $query);
    
        $currentCategory = null; // Track the current category
    
        echo '<form method="post">';
    
        while ($rows = mysqli_fetch_array($sqlquery)) {
            $category = $rows['categoryName'];
            $questionID = $rows['questionID'];
            $description = $rows['description'];
    
            // Check if the category has changed
            if ($category != $currentCategory) {
                // Close the previous table if it exists
                if ($currentCategory !== null) {
                    echo '</table>';
                }
    
                // Start a new table for the current category
                echo '<h3>' . $category . '</h3>';
                echo '<table class="list">
                        <tr>
                            <th>Question</th>
                            <th>Rating</th>
                        </tr>';
            }
    
            // Display the question in the current category with a radio button
            echo '<tr>
            <td>' . $description . '</td>
            <td>';
            
    // Radio buttons with a divider
                echo '<input type="radio" name="rating[' . $questionID . ']" value="1"> 1';
                echo '<div style="border-left: 1px solid #000; display: inline-block; margin: 0 10px;"></div>';
                echo '<input type="radio" name="rating[' . $questionID . ']" value="2"> 2';
                echo '<div style="border-left: 1px solid #000; display: inline-block; margin: 0 10px;"></div>';
                echo '<input type="radio" name="rating[' . $questionID . ']" value="3"> 3';
                echo '<div style="border-left: 1px solid #000; display: inline-block; margin: 0 10px;"></div>';
                echo '<input type="radio" name="rating[' . $questionID . ']" value="4"> 4';
                echo '<div style="border-left: 1px solid #000; display: inline-block; margin: 0 10px;"></div>';
                echo '<input type="radio" name="rating[' . $questionID . ']" value="5"> 5';
                
                echo '</td>
          </tr>';
            $currentCategory = $category;
        }
    
        // Close the last table if it exists
        if ($currentCategory !== null) {
            echo '</table>';
        }
    
        // Submit button for the form
        echo '<input type="submit" name="submit" value="Submit">';
        echo '</form>';
    
        // Rest of your HTML or PHP code goes here
    }
     ?>