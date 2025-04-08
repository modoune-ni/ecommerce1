<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $conn = new mysqli("localhost", "root", "", "ecommerce1");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 350px;">
            <h3 class="text-center">Create Account</h3>
            <form action="inscription.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Name and Surname</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter your name and surname" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>  
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">I agree with <a href="#">Terms and Privacy</a></label>
                </div>
                <button type="submit" class="btn btn-warning w-100">Sign Up</button>
            </form>
            <div class="text-center mt-3">
                <small>Already have an account? <a 

