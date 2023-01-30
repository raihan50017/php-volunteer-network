<?php
include("./common/header.php");
$id = $_GET["id"];
$sql = "SELECT * FROM events WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$event_data = false;

if (isset($_POST["submit"])) {
    $volunteer_id = $_SESSION["id"];
    $sql = "INSERT INTO volunteers(volunteer_id, event_id) VALUES('$volunteer_id','$id')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration Successfull";
    }
}

if (isset($_SESSION["email"])) {
    $volunteer_id = $_SESSION["id"];
    $sql = "SELECT * FROM volunteers WHERE volunteer_id = $volunteer_id AND event_id = $id";
    $event_result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($event_result) > 0) {
        $event_data = true;
    }
}

?>
<div style="min-height: 100vh;" class="container">
    <div class="mt-2 mb-2">
        <div>
            <div class="row g-2">
                <div class="col-md-4 h-100 bg-white">
                    <div class="p-1 border shadow-sm">
                        <img class="w-100" src="../volunteer_admin/uploads/<?= $row['event_image'] ?>" alt="">
                    </div>
                </div>
                <div class="col-md-8 h-100">
                    <div class="bg-white shadow-sm">
                        <h4 class="p-2 bg-light"><?= $row["event_name"] ?></h4>
                        <div class="p-2">
                            <table class="table table-sm border-0">
                                <tbody>
                                    <tr class="bg-light" style="border-bottom: 1px solid white;">
                                        <td class="fw-bold"><i class="fa-solid fa-clock"></i> Start Time</td>
                                        <td><?= date("m/d/y g:i A", strtotime($row['event_starting_time'])); ?></td>
                                    </tr>
                                    <tr class="bg-light" style="border-bottom: 1px solid white;">
                                        <td class="fw-bold"><i class="fa-solid fa-clock"></i> End Time</td>
                                        <td> <?= date("m/d/y g:i A", strtotime($row['event_ending_time'])); ?></td>
                                    </tr>
                                    <tr class="bg-light" style="border-bottom: 1px solid white;">
                                        <td class="fw-bold"><i class="fa-solid fa-location-dot"></i> Event Location</td>
                                        <td><?= $row["event_location"] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-2">
                            <h5 class="p-2 m-0 bg-light border-top border-start border-end">About Event</h5>
                            <p class="m-0 border p-2"><?= $row["event_description"] ?></p>
                        </div>
                        <div class="p-2">
                            <?php
                            if ($event_data) {
                            ?>
                                <button type="button" class="btn btn-success" disabled>Already Registered</button>
                            <?php
                            } else {
                            ?>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">Register as Volunteer</button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<?php
if (isset($_SESSION["email"])) {
?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Child Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>I agree all terms and conditions</p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="">
                        <button type="submit" name="submit" class="btn btn-success">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Child Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sorry!! Youn need to login first for registration</p>
                </div>
                <div class="modal-footer">
                    <a href="login.php" class="btn btn-success">Goto login</a>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>



<?php
include("./common/footer.php")
?>