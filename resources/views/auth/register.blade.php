<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - GreenTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card shadow p-4" style="width: 400px;">
        <h3 class="text-center mb-4">Create Account</h3>
        <form id="registerForm">
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>I am a...</label>
                <select id="role" class="form-control">
                    <option value="student">Student</option>
                    <option value="teacher">Staff</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
        <div class="text-center mt-3">
            <a href="/login">Already have an account? Login</a>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const role = document.getElementById('role').value;

            console.log("Attempting to register:", email);

            try {
                const response = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ name, email, password, role })
                });

                const result = await response.json();
                console.log("Server Response:", result);

                if (response.ok) {
                    alert("Registration Successful! Redirecting to Home...");
                    window.location.href = '/';
                } else {
                    alert('Registration Failed: ' + (result.message || JSON.stringify(result)));
                }

            } catch (error) {
                console.error("Network Error:", error);
                alert('System Error. Check console (F12) for details.');
            }
        });
    </script>
</body>
</html>
