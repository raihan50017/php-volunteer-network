<?php
include("./common/header.php");
if (!isset($_SESSION["email"])) {
    header("location:login.php");
}
$id = $_SESSION["id"];

if (isset($_POST["submit"])) {
    extract($_POST);
    $sql = "DELETE FROM volunteers WHERE event_id = $event_id AND volunteer_id = $volunteer_id";
    if (mysqli_query($conn, $sql)) {
        echo "Canceled Succcessfully";
    }
}

$sql = "SELECT * FROM volunteers, events WHERE volunteers.volunteer_id = $id AND volunteers.event_id =  events.id";
$resuslt = mysqli_query($conn, $sql);
?>
<div class="container">
    <div class="mt-2 mb-2">
        <div>
            <div style="min-height: 90vh;" class="row g-2">
                <div class="col-md-4 bg-white shadow-sm rounded">
                    <p style="font-size:100px;" class="m-0 text-center"><i class="fa-regular fa-circle-user"></i></p>
                    <h5 class="text-center"><?= $_SESSION["name"] ?></h5>
                </div>
                <div class="col-md-8">
                    <div class="shadow-sm h-100 bg-white rounded">
                        <h5 class="text-center p-2 border-bottom">Registered Events</h5>
                        <div class="p-2">
                            <?php
                            while ($row = mysqli_fetch_assoc($resuslt)) :
                            ?>
                                <div class="shadow-sm bg-light p-2 mb-2">
                                    <div class="row g-3">
                                        <div class="col-2">
                                            <img src="../volunteer_admin/uploads/<?= $row['event_image'] ?>" class="w-100">
                                        </div>
                                        <div class="col-8">
                                            <h6 class="m-0">
                                                <?= $row["event_name"] ?>
                                            </h6>
                                            <p class="m-0"><i class="fa-solid fa-clock"></i> <?= date("m/d/y g:i A", strtotime($row['event_starting_time'])); ?></p>
                                        </div>
                                        <div class="col-2 text-end">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id'] ?>">
                                                Cancel
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Cancellation</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            Do you really cancel registration?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="" method="POST">
                                                                <input value="<?= $row['id'] ?>" type="hidden" name="event_id">
                                                                <input value="<?= $row['volunteer_id'] ?>" type="hidden" name="volunteer_id">
                                                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Confirm</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("./common/footer.php")
?>