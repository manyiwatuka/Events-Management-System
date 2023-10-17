<div class="container-fluid">
    <form action="" id="manage-register">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id :'' ?>">
        <input type="hidden" name="event_id" value="<?php echo isset($_GET['event_id']) ? $_GET['event_id'] :'' ?>">
        <div class="form-group">
            <label for="" class="control-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name :'' ?>" required>
        </div>
        <div class="form-group">
            <label for="" class="control-label">ID No.</label>
            <input type="text" name="address" class="form-control" value="<?php echo isset($address) ? $address :'' ?>" required>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email :'' ?>" required>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Phone Number</label>
            <input type="text" class="form-control" name="contact" value="<?php echo isset($contact) ? $contact :'' ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
		<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
    </form>
</div>

<script>
    $('.datetimepicker').datetimepicker({
        format: 'Y/m/d H:i',
        startDate: '+3d'
    });

    $('#manage-register').submit(function (e) {
        e.preventDefault();

        // Check if all required fields are filled
        if (this.checkValidity()) {
            start_load();
            $('#msg').html('');

            $.ajax({
                url: 'admin/ajax.php?action=save_register',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function (resp) {
                    if (resp == 1) {
                        alert_toast("Registration Request Sent.", 'success');
                        end_load();
                        uni_modal("", "register_msg.php");
                    }
                }
            });
        } else {
            alert("Please fill in all required fields.");
        }
    });
</script>
