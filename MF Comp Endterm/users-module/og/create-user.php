<?php
 if($user_access_level == 'Staff' && $user_id_login != $id){
    header("location: index.php?page=settings&subpage=users");
 }
?>
<h3>User Information</h3>
<div id="form-block">
<form method="POST" action="processes/process.user.php?action=new" onsubmit="return validateForm()">
    <div id="form-block-half">
        <label for="fname" class="input-text">First Name</label>
        <input type="text" id="fname" class="input" name="firstname" placeholder="Your name.." required>

        <label for="lname" class="input-text">Last Name</label>
        <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name.." required>

        <label for="access" class="input-text">Access Level</label>
        <select id="access" name="access" required>
            <option value="owner">Owner</option>
            <option value="manager">Manager</option>
            <option value="staff">Staff</option>
        </select>
        <label for="branch" class="input-text">Branch</label>
        <select id="branch" name="branch" required>
            <option value="Main">Main</option>
            <option value="Second">Second</option>
            <option value="Mandalagan">Mandalagan</option>
            <option value="Kabankalan">Kabankalan</option>
        </select>
    </div>
    <div id="form-block-half">
        <label for="email" class="input-text">Email</label>
        <input type="email" id="email" class="input-1" name="email" placeholder="Your email.." required>

        <label for="password" class="input-text">Password</label>
        <input type="password" id="password" class="input-1" name="password" placeholder="Enter password.." required>

        <label for="confirmpassword" class="input-text">Confirm Password</label>
        <input type="password" id="confirmpassword" class="input-2" name="confirmpassword"
            placeholder="Confirm password.." required>
    </div>
    <div id="button-block">
        <input type="submit" value="Save Form">
    </div>
</form>

<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmpassword").value;
        var email = document.getElementById("email").value;

        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }

        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            return false;
        }

        if (!validateEmail(email)) {
            alert("Invalid email address.");
            return false;
        }

        return true;
    }

    function validateEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
</script>

  </body>
</html>