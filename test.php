<?php
require('script.php');


function inputAutor()
{
    $inputAutor = 0;
    for ($i = 0; $i < 6; $i++) {
        if (isset($_POST['bookAutor' . $i . ''])) {
            $inputAutor++;
        }
    }
    return $inputAutor;
}

if (isset($_GET['addBook'])) {

    $inputAutor = inputAutor();
    $i = 0;
    $idAutor = '';
    while ($i < $inputAutor) {
        $exAutors = explode(',', $exConfirmBook[0]);

        $postName = 'bookAutor' . $i;
        $autor = explode(" ", $_POST[$postName]);
        $idAutor .= $autor[0] . ',';
        $i++;
    }
    $idAutor = substr($idAutor, 0, -1);
    $IdCategories = $_POST['bookCategories'];
    $task = "SELECT * FROM Categories WHERE Id_categories=$IdCategories";
    $query = mysqli_query($connect, $task);
    $fetch = mysqli_fetch_assoc($query);
    $catName = $fetch['Name_categories'];
    $bookTitle = $_POST['bookTitle'];
    $info = $_POST['bookInfo'];
    $bookTags = $_POST['bookTags'];
    $userId = $_SESSION['userId'];
    $patch = save_img('bookImg', $bookTitle, 'imgBook');
    echo $taskAdd = "INSERT INTO Book VALUES (NULL, '$idAutor', '$bookTitle', '$patch', $IdCategories, '$info', NULL, 0, $userId, '$bookTags')";
    $queryAdd = mysqli_query($connect, $taskAdd);

    $taskLast = "SELECT Id_Book FROM Book WHERE Book_user_Id = $userId ORDER BY Id_Book DESC LIMIT 1";
    $queryLast = mysqli_query($connect, $taskLast);
    $fetchLast = mysqli_fetch_assoc($queryLast);

    $ID = $fetchLast['Id_Book'];
    header("Location:rowBook.php?ID=$ID");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<label class="text-white" for="bookAutor">Autor</label>
<input type="text" name="game" class="form-control" id="bookAutor" placeholder="Autor" value="<?= $idAutor ?>">
</body>
</html>
