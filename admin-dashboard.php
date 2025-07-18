<?php
session_start();
include('partials/connect.php');
include('partials/header.php');


// Protect the page
if(!isset($_SESSION['admin_name'])){
    header("location: login.php");
    exit;
}
// 1. Today's date
$today = date('Y-m-d');


$booking_sql = "SELECT COUNT(*) AS total FROM bookings WHERE date = '$today'";
$booking_result = mysqli_query($conn, $booking_sql);
$booking_data = mysqli_fetch_assoc($booking_result);
$todays_bookings = $booking_data['total'] ?? 0;

$week_start = date('Y-m-d', strtotime('monday this week'));
$week_end = date('Y-m-d', strtotime('sunday this week'));
$revenue_sql = "SELECT SUM(price) AS revenue 
                FROM bookings 
                WHERE date BETWEEN '$week_start' AND '$week_end'";
$revenue_result = mysqli_query($conn, $revenue_sql);
$revenue_data = mysqli_fetch_assoc($revenue_result);
$weekly_revenue = $revenue_data['revenue'] ?? 0;


$customer_sql = "SELECT COUNT(*) AS total FROM users WHERE role = 'customer'";
$customer_result = mysqli_query($conn, $customer_sql);
$customer_data = mysqli_fetch_assoc($customer_result);
$total_customers = $customer_data['total'] ?? 0;
?>




<div class="dashboard-container">

<h2>Welcome , <?php echo $_SESSION['admin_name'];?></h2>
<p>You are logged in as an admin.</p>


<div style="margin-top: 30px;">
    <h3>📅 Bookings Today: <?php echo $todays_bookings; ?></h3>
    <h3>💰 This Week's Revenue: KSh <?php echo $weekly_revenue; ?></h3>
    <h3>👥 Total Customers: <?php echo $total_customers; ?></h3>
</div>


<a class="manage-btn" href="manage-bookings.php">Manage bookings</a>
<a class="logout-btn" href="logout.php">Logout</a>

</div>
    
<?php
include('partials/footer.php');
?>