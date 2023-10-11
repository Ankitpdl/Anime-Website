<?php
// update-like.php
require('./connection/config.php');
// Assuming you have established a database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the comment ID and new like count from the AJAX request
    $commentId = $_POST['commentId'];
    $newLikeCount = $_POST['newLikeCount'];

    // Update the like count in the database
    $updateQuery = "UPDATE comments SET `Like` = $newLikeCount WHERE id = $commentId";
    $updateResult = mysqli_query($conn, $updateQuery);
    //make sure that the like will only update once, you can refer to the code below.
 // <div class="anime__details__btn">
 //                            <form method="POST" action='<?php if (isset($_SESSION['username'])) {
 //                                                            echo "Bookmark.php";
 //                                                        } else {
 //                                                            echo "#";
 //                                                        } ?>'>
 //                                <input type="number" name="a_id" value="<?php echo $id; ?>" hidden>
 //                                <?php
 //                                if (isset($_SESSION['id'])) {

 //                                ?>
 //                                    <input type="number" name="u_id" value="<?php echo $_SESSION['id']; ?>" hidden>
 //                                <?php
 //                                }
 //                                ?>

 //                                <?php

 //                                $id = $_GET['id'];
 //                                $sql = "SELECT `User_Name`,`Email`,`Pic`,`Password`,bookmark.id FROM `anime_info` INNER JOIN `bookmark` INNER JOIN `user` on bookmark.A_id='$id' and bookmark.U_id=user.id ";
 //                                $result = mysqli_query($conn, $sql);
 //                                $isBookmarked = mysqli_fetch_assoc($result);

 //                                if (!$isBookmarked) {
 //                                ?>
 //                                    <button type="submit" class="follow-btn" name="follow" value="submit" style="border: none;"><i class="fa fa-heart-o"></i>
 //                                        Follow
 //                                    </button>
 //                                <?php
 //                                } else {
 //                                ?>
 //                                    <a type="button" class="follow-btn" style="border: none;color: white;" href="DeleteBookmark.php?bid=<?php echo $isBookmarked['id'] ?>&aid=<?php echo $id ?>"><i class=" fa fa-heart-o"></i>
 //                                        Followed
 //                                    </a>
 //                                    <span style="color: white;">Click to unfollow</span>
 //                                <?php

 //                                }
 //                                ?>
 //                            </form>
 //                        </div>

    if ($updateResult) {
        echo "Success";
    } else {
        echo "Error updating the like count.";
    }
}
