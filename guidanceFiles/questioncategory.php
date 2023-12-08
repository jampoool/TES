<?php 
include "../connect.php";
include "guidanceFunction.php";
session_start();
guidanceCategoryFunction();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../scriptfiles/guidancepanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href= "questioncategory.css" rel= "stylesheet">
    <title>Guidance - Question Category</title>
</head>
<body>
    <div class="question-category">
        <h2>Question Category</h2>
        <span>Home / Manage Question Category</span>
    </div>
    <div class="left">
        <button id="addQuestionCategory">Add New Question Category</button>
    </div>
    <div class="popup">
    <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Question Category</h2>
            <div class="form-element">
                <input type="text" placeholder="Category Name" id="categoryname" name="categoryName">
            </div>
            <div class="form-element">
                <textarea name="description" id="description" placeholder="Description"></textarea>
            </div>
            <div class="form-element">
                <button id="add-btn" name="addbtn">Add</button>
            </div>
            </form>
        </div>
    </div>
    <center>
        <div class="container">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   get_category_Records(); ?>
            </table>
        </div>
    <script type="text/javascript" src="../scriptfiles/questionCategory.js"></script>
</body>
</html>