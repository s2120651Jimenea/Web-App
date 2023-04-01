<h3>User Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname" class="input-text">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">

            <label for="lname" class="input-text">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

            <label for="access" class="input-text">Access Level</label>
            <select id="access" name="access">
              <option value="owner">Owner</option>
              <option value="manager">Manager</option>
              <option value="staff">Staff</option>
            </select>
            <label for="branch" class="input-text">Branch</label>
            <select id="branch" name="branch">
              <option value="Main">Main</option>
              <option value="Second">Second</option>
              <option value="Mandalagan">Mandalagan</option>
              <option value="Kabankalan">Kabankalan</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="email" class="input-text">Email</label>
            <input type="email" id="email" class="input-1" name="email" placeholder="Your email..">

            <label for="password" class="input-text">Password</label>
            <input type="password" id="password" class="input-1" name="password" placeholder="Enter password..">

            <label for="confirmpassword" class="input-text">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input-2" name="confirmpassword" placeholder="Confirm password..">
            
        </div>
        <div id="button-block">
        <input type="submit" value="Save Form">
        </div>
  </form>
</div>