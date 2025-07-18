<?php
session_start();
include('partials/connect.php');
include('partials/header.php');

// Protect the page
if(!isset($_SESSION['admin_name'])){
    header("location: login.php");
    exit;
}

// Fetch the bookings
$sql = "SELECT b.*, u.name AS customer_name
        FROM bookings b
        JOIN users u ON b.user_id = u.id
        ORDER BY b.date DESC, b.time DESC";

$result = mysqli_query($conn, $sql);
?>

<div class="dashboard-container">
  <h2>Manage Bookings</h2>

  <div class="table-container">
    <table>
      <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Service</th>
        <th>Barber</th>
        <th>Price</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>

      <?php
      if (mysqli_num_rows($result) > 0) {
          $sn = 1;
          while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $sn++ . "</td>";
              echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
              echo "<td>" . htmlspecialchars($row['service']) . "</td>";
              echo "<td>" . htmlspecialchars($row['barber']) . "</td>";
              echo "<td>$" . number_format($row['price'], 2) . "</td>";
              echo "<td>" . $row['date'] . "</td>";
              echo "<td>" . $row['time'] . "</td>";
              echo "<td>" . htmlspecialchars($row['status']) . "</td>";
              echo "<td>
                      <a href='#' class='btn edit'>Edit</a>
                      <a href='#' class='btn cancel'>Cancel</a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='9'>No bookings found.</td></tr>";
      }
      ?>
    </table>
  </div>
</div>

<?php include('partials/footer.php'); ?>
