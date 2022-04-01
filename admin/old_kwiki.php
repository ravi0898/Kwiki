<?php

include'controller/session.php';
//include'../controller/config.php';

date_default_timezone_set("America/New_York");

$today =  date('m/d/Y');

$sql_get = mysqli_query($con,"Select * FROM contest WHERE edate < '$today' AND status='2'");

//$count = count($setdata);

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <title>Kwiki Admin | Design by Developer Bazaar Technologies</title>

    <!-- Google font-->

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

    <!-- App css-->

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive css-->

    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

</head>



<body>

    <!-- tap on top starts-->

    <div class="tap-top"><i data-feather="chevrons-up"></i></div>

    <!-- tap on tap ends-->

    <!-- page-wrapper Start-->

    <div class="page-wrapper compact-wrapper" id="pageWrapper">



        <!--  header-section start  -->

        <?php include('include/header.php'); ?>

        <!--  header-section end  -->



        <!-- Page Body Start-->

        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->

            <?php include('include/sidebar.php'); ?>

            <!-- Page Sidebar Ends-->

            <div class="page-body">

                <!-- Container-fluid starts-->

                <div class="container-fluid">

                    <div class="row second-chart-list third-news-update">

                      <div class="col-sm-12">

                        <div class="card">

                          <div class="card-body">

                         

                           

                            <div class="table-responsive">

                              <table class="display" id="example-style-1">

                                <thead>

                                  <tr>

                                    <th>Fullname</th>

                                    <th>Email </th>

                                    <th>Username</th>

                                    <th>Earned Amt's</th>

                                    <th>View Kwiki's</th>

                                    

                                  </tr>

                                </thead>

                                <tbody>

                                   

                                    <?php

                                

                                    while($setdata = mysqli_fetch_array($sql_get)){
                                    
                                    $access_id = $setdata['access_id'];
                                    $price     = mysqli_query($con,"SELECT SUM(price) FROM `orders` WHERE access_id='$access_id' AND status='1'");
                                    $get_price = mysqli_fetch_array($price);
                                    ?>

                                  <tr>

                                     <td><?php echo $setdata['fname'] ." ". $setdata['lname'] ;?></td>

                                    <td><?php echo $setdata['email'];?></td>

                                    <td><?php echo $setdata['socialmedia_uname'];?></td>

                                    <td>$<?php if(isset($get_price['SUM(price)'])){ echo $get_price['SUM(price)']; }else{ echo "0"; } ?></td>


                                   

                                    <td>

                                        <a href="view_kwiki.php?id=<?php echo $setdata['id'];?>" class="btn btn-secondary"><i class="fa fa-eye"></i></a>

                                    </td>

                                   

                                  <?php }?>

                                </tbody>

                              </table>

                            </div>

                          

                          </div>

                         

                        </div>

                      </div>

                    </div>

                </div>

                <!-- Container-fluid Ends-->

            </div>



            <!--  Footer-section start  -->

            <?php include('include/footer.php'); ?>

            <!--  Footer-section end  -->

</body>



</html>