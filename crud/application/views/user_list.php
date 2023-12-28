<?php $this->load->view('includes/header'); ?>

    <style>
        /* Add your custom styles here */
        body {
            padding: 20px; /* Add padding for better spacing */
        }

        h2 {
            color: #007bff; /* Set heading color to Bootstrap primary color */
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff; /* Set header background color to Bootstrap primary color */
            color: #fff; /* Set header text color to white */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Set even row background color */
        }

        a {
            color: #007bff; /* Set link color to Bootstrap primary color */
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline; /* Add underline on hover */
        }
    </style>


    <div class="container">
        <h2>User List</h2>
        <a class="btn btn-primary" href="<?php echo base_url('user_controller/add_user'); ?>">Add New User</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $serial_number = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $serial_number; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->mobile; ?></td>
                        <td><?php echo $user->gender; ?></td>
                        <td><?php echo $user->state; ?></td>
                        <td>
                            <a class="btn btn-warning" href="<?php echo base_url('user_controller/edit_user/' . $user->id); ?>">Edit</a>
                            <a class="btn btn-danger" href="<?php echo base_url('user_controller/delete_user/' . $user->id); ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                        </td>
                    </tr>
                    <?php $serial_number++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php $this->load->view('includes/footer'); ?>