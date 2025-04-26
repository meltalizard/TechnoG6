<form action="register.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="pnumber">Phone Number:</label>
    <input type="text" name="pnumber" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <label for="street_address">Street Address:</label>
    <input type="text" name="street_address" required><br>

    <label for="apartment_unit_suite">Apartment/Unit/Suite (Optional):</label>
    <input type="text" name="apartment_unit_suite"><br>

    <label for="barangay">Barangay:</label>
    <input type="text" name="barangay" required><br>

    <label for="city_municipality">City / Municipality:</label>
    <input type="text" name="city_municipality" required><br>

    <label for="province">Province:</label>
    <input type="text" name="province" required><br>

    <label for="postal_code">Postal Code:</label>
    <input type="text" name="postal_code" required><br>

    <input type="submit" value="Register">
</form>

<form action="schedule_appointment.php" method="POST">
    <label for="appointment_date">Appointment Date:</label>
    <input type="datetime-local" name="appointment_date" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br>

    <label for="clinic">Select Clinic:</label>
    <select name="clinic" required>
        <option value="Clinic 1">Clinic 1</option>
        <option value="Clinic 2">Clinic 2</option>
        <option value="Clinic 3">Clinic 3</option>
        <option value="Clinic 4">Clinic 4</option>
        <option value="Clinic 5">Clinic 5</option>
    </select><br>

    <input type="submit" value="Schedule Appointment">
</form>