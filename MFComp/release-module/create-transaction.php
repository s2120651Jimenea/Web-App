<h3>Provide the Branch to be Delivered</h3>
<div id="form-block-transac">
    <form method="POST" action="processes/process.release.php?action=create">
        <div id="form-block-center">
              <label for="branch" class="input-text-prod">Branch</label>
              <select id="branch" name="branch">
                <option value="Second" <?php if($user->get_user_branch($id) == "Second Branch"){ echo "selected";};?>>Second Branch</option>
                <option value="Mandalagan" <?php if($user->get_user_branch($id) == "Mandalagan Branch"){ echo "selected";};?>>Mandalagan Branch</option>
                <option value="Kabankalan" <?php if($user->get_user_branch($id) == "Kabankalan Branch"){ echo "selected";};?>>Kabankalan Branch</option>
              </select>
        </div>

        <div id="button-block">
        <input type="submit" value="Create">
        </div>
  </form>
</div>