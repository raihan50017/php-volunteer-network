<?php
include("./common/header.php");
?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div style="background-image:linear-gradient(rgba(0,0,0,.3),rgba(0,0,0,.3),rgba(0,0,0,.3)), url('https://www.toronto.ca/wp-content/uploads/2017/12/8e10-get-involved-v2-banner.jpg'); background-repeat:no-repeat; background-size:cover; background-position: center center;" class="carousel-item active position-relative p-5">
            <h1 class="carousel-text-heading d-none d-md-block text-light m-5 p-5 text-center">Raise Hand For Humanity</h1>
        </div>
        <div style="background-image:linear-gradient(rgba(0,0,0,.3),rgba(0,0,0,.3),rgba(0,0,0,.3)), url('https://www.toronto.ca/wp-content/uploads/2017/12/8e10-get-involved-v2-banner.jpg'); background-repeat:no-repeat; background-size:cover; background-position: center center;" class="carousel-item position-relative p-5">
            <h1 class="carousel-text-heading d-none d-md-block text-light m-5 p-5 text-center">Raise Hand For Humanity</h1>
        </div>
        <div style="background-image:linear-gradient(rgba(0,0,0,.3),rgba(0,0,0,.3),rgba(0,0,0,.3)), url('https://www.toronto.ca/wp-content/uploads/2017/12/8e10-get-involved-v2-banner.jpg'); background-repeat:no-repeat; background-size:cover; background-position: center center;" class="carousel-item position-relative p-5">
            <h1 class="carousel-text-heading d-none d-md-block text-light m-5 p-5 text-center">Raise Hand For Humanity</h1>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="container-fluid">
    <div>
        <h4 class="p-2 border-bottom border-2">Connect with volunteer team</h4>
    </div>

    <div class="mt-2 mb-2">
        <div class="row row-cols-1 row-cols-md-4 g-2">
            <?php
            $sql = "SELECT * FROM events";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <div class="col">
                    <a class="text-decoration-none text-dark h-100" href="event_details.php?id=<?= $row['id'] ?>">
                        <div class="card event-card border-none rounded-0 h-100">
                            <div style="height: 200px; overflow:hidden;" class="p-1">
                                <img src="../volunteer_admin/uploads/<?= $row['event_image'] ?>" class="card-img-top rounded-0" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["event_name"] ?></h5>
                                <p class="card-text"><?= $row["event_description"] ?></p>
                            </div>
                            <div class="card-footer bg-white">
                                <p><i class="fa-solid fa-clock"></i> <?= date("m/d/y g:i A", strtotime($row['event_starting_time'])); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php
include("./common/footer.php")
?>