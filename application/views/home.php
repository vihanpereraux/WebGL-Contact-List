<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <!-- Checking the content -->
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla aliquid ex ipsum, voluptatem 
                quibusdam quis alias deserunt possimus dolor itaque repellendus architecto obcaecati doloribus 
                quod. Quidem fugit ipsa doloribus reprehenderit!
            </div>

            <div class="col-lg-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla aliquid ex ipsum, voluptatem 
                quibusdam quis alias deserunt possimus dolor itaque repellendus architecto obcaecati doloribus 
                quod. Quidem fugit ipsa doloribus reprehenderit!
            </div>     

        </div>

        <div class="row">
            <?php 
                if (is_array($result) || is_object($result))
                {
                    foreach($result as $key => $value)
                    {
                        ?>
                            <div class="card mb-5">
                                <!-- <h5 class="card-header">Featured</h5> -->
                                <div class="card-body">
                                <p class="card-text"> Name 01  <?= $value['fname']?>
                                <br>
                                <p class="card-text"> Name 02  <?= $value['lname']?>
                                <br>
                                <p class="card-text"> Phone Number  <?= $value['number']?>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo "Unfortunately, an error occured.";
                }
            ?>
        </div>
    </div>
</body>
</html>