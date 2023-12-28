<?php $this->load->view('includes/header'); ?>

<style>
    body {
        padding: 20px;
    }

    h2 {
        color: #007bff;
        text-align: center;
    }

    .form-container {
        width: 50%;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 5px;
        box-sizing: border-box;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        padding: 8px 15px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>


    <h2>Update User Information</h2>
    <?php echo form_open('user_controller/update_user/' . $user->id); ?>

    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo set_value('name', $user->name); ?>" required>
    <?php echo form_error('name'); ?><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo set_value('email', $user->email); ?>" required>
    <?php echo form_error('email'); ?><br>

    <label for="mobile">Mobile:</label>
    <input type="text" name="mobile" value="<?php echo set_value('mobile', $user->mobile); ?>" maxlength="10" required>
    <?php echo form_error('mobile'); ?><br>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="Male" <?php echo set_select('gender', 'Male', ($user->gender == 'Male')); ?>>Male</option>
        <option value="Female" <?php echo set_select('gender', 'Female', ($user->gender == 'Female')); ?>>Female</option>
        <option value="Others" <?php echo set_select('gender', 'Others', ($user->gender == 'Others')); ?>>Others</option>
    </select><br>

    <label for="state">State:</label>
    <select name="state" required>
        <option value="West Bengal" <?php echo set_select('state', 'West Bengal', ($user->state == 'West Bengal')); ?>>West Bengal</option>
        <option value="Maharashtra" <?php echo set_select('state', 'Maharashtra', ($user->state == 'Maharashtra')); ?>>Maharashtra</option>
        <option value="Delhi" <?php echo set_select('state', 'Delhi', ($user->state == 'Delhi')); ?>>Delhi</option>
        <option value="Telangana" <?php echo set_select('state', 'Telangana', ($user->state == 'Telangana')); ?>>Telangana</option>
    </select><br>

    <input type="submit" value="Update">
    <?php echo form_close(); ?>



    <?php $this->load->view('includes/footer'); ?>