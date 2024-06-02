<?php

include 'connect.php';
$months_till_now = mysqli_query($conn, "SELECT DISTINCT month FROM `orders` where `year` = '2024'");
$montsrun = $months_till_now;
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Margines Bhimavaram Online</title>

  <meta name="description" content />

  <link rel="icon" type="image/x-icon" href="Bhavani/img/favicon/favicon.ico" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="Bhavani/vendor/fonts/boxicons.css" />

  <link rel="stylesheet" href="Bhavani/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="Bhavani/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="Bhavani/css/demo.css" />

  <link rel="stylesheet" href="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <script src="Bhavani/vendor/js/helpers.js"></script>

  <script src="Bhavani/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php include 'sidebar.php'; ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bhimavaram Online/</span> Monthly Margines</h4>


            <div class="card">
              <h5 class="card-header">2024 Monthly Orders</h5>
              <div class="table-responsive text-nowrap">
                <table class="table" id="monthwise">
                  <thead>
                    <tr>
                      <th onclick="sortTable(0,'monthwise')">Month</th>
                      <th onclick="sortTable(1,'monthwise')">Total Margine</th>
                      <th onclick="sortTable(2,'monthwise')">Total Orders</th>
                      <th onclick="sortTable(3,'monthwise')">Average Margin</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php
                    $total_margin_thisyear = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(margin) as total_margin FROM `orders` WHERE `year` = '2024'"))['total_margin'];

                    $total_orders_thisyear = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total_orders FROM `orders` WHERE `year` = '2024'"))['total_orders'];

                    $average_margin_thisyear = $total_margin_thisyear / $total_orders_thisyear;

                    while ($monthly = mysqli_fetch_assoc($montsrun)) {
                      $everymonth = $monthly['month'];
                      $thismonth_total_margin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(margin) as total_margin FROM `orders` WHERE month = '$everymonth' AND `year` = '2024'"))['total_margin'];

                      $thismonth_total_orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total_orders FROM `orders` WHERE month = '$everymonth' AND `year` = '2024'"))['total_orders'];

                      $thismonth_average_margin = $thismonth_total_margin / $thismonth_total_orders;

                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong><?php echo $everymonth; ?></strong>
                        </td>
                        <td><?php echo $thismonth_total_margin; ?></td>
                        <td><?php echo $thismonth_total_orders; ?></td>
                        <td><?php echo (int)$thismonth_average_margin; ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <strong>This Year</strong>
                      </td>
                      <td><?php echo $total_margin_thisyear; ?></td>
                      <td><?php echo $total_orders_thisyear; ?></td>
                      <td><?php echo (int)$average_margin_thisyear; ?></td>
                    </tr>


                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->

            <hr class="my-5" />


            <!--/ Responsive Table -->
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="http://saipraveen.free.nf" target="_blank" class="footer-link fw-bolder">Sai Praveen</a>
              </div>
              <div>
                <a href="https://srkrec.edu.in/spellbee/" class="footer-link me-4" target="_blank">SRKR SpellBee</a>
                <a href="http://saipraveen.free.nf/lunchbox/" target="_blank" class="footer-link me-4">Lunch Box</a>

                <a href="http://srkrcampusonline.rf.gd" target="_blank" class="footer-link me-4">CampuOnline</a>


              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <script src="Bhavani/vendor/libs/jquery/jquery.js"></script>
  <script src="Bhavani/vendor/libs/popper/popper.js"></script>
  <script src="Bhavani/vendor/js/bootstrap.js"></script>
  <script src="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="Bhavani/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="Bhavani/js/main.js"></script>

  <script>
    function sortTable(n,table) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById(table);
      switching = true;
      // Set the sorting direction to ascending:
      dir = "asc";
      /* Make a loop that will continue until
      no switching has been done: */
      while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
          // Start by saying there should be no switching:
          shouldSwitch = false;
          /* Get the two elements you want to compare,
          one from current row and one from the next: */
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /* Check if the two rows should switch place,
          based on the direction, asc or desc: */
          if (dir == "asc") {
            if (Number(x.innerHTML) > Number(y.innerHTML)) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (Number(x.innerHTML) < Number(y.innerHTML)) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /* If a switch has been marked, make the switch
          and mark that a switch has been done: */
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          // Each time a switch is done, increase switchcount by 1:
          switchcount++;
        } else {
          /* If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again. */
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
  </script>


  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>