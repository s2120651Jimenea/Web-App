<div id="form-block-transac">
    <form method="POST" action="processes/process.receive.php?action=create">
        <div id="form-block-center">
            <label for="amount" class="input-text-prod">Amount</label>
            <input type="text"id="amount" class="input" name="amount" placeholder="Amount.." required/>

            <label for="branch" class="input-text-prod">Branch</label>
            <select id="branch" name="branch" disabled>
              <option value="Main" <?php if($user->get_user_branch($id) == "Main Branch"){ echo "selected";};?>>Main Branch</option>
            </select>
        </div>

        <div id="button-block">
        <input type="submit" value="Create">
        </div>
    </form>
</div>