<?php
include('partials/header.php');

?>
<section class="form-book">
    <h1 class="form-h2">Book an Appointment</h1>

    <form action="book.php" method="POST">
      <!-- Service -->
      <label for="service">Choose a Service</label>
      <select name="service" id="service" required>

        <option value="">Select Service</option>
        <option value="Haircut">Haircut</option>
        <option value="Beard Trim">Beard Trim</option>
        <option value="Shave">Shave</option>
        <option value="Combo">Hair + Beard Combo</option>
        <option value="Combo">kids Haircut</option>
        <option value="Combo">color treatment</option>
      </select>


      <label for="date">Date</label>
      <input type="date" name="date" id="date" required>


      <label for="time">Time</label>
      <input type="time" name="time" id="time" required>


      <label for="barber">Choose a Barber</label>
      <select name="barber" id="barber">
        <option value="">No Preference</option>
        <option value="John">John</option>
        <option value="Mark">Mark</option>
        <option value="David">David</option>
      </select>

      <!-- Name -->
      <label for="name">Full Name</label>
      <input type="text" name="name" id="name" placeholder="Your full name" required>

      <!-- Email -->
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Your email address" required>

      <!-- Submit -->
      <input type="submit" class="btn-form" value="Book Appointment">
    </form>
  </section>


  <?php
  include('partials/footer.php');
  ?>