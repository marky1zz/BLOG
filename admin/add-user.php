<?php
    include 'partials/header.php';
?>
    <!-- ======================= END OF NAV ======================== -->

    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add User</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="First name">
                <input type="text" placeholder="Last name">
                <input type="text" placeholder="Username">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Creat Password">
                <input type="password" placeholder="Confirm Password">
                <select>
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                <div class="form_control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" id="avatar">
                </div>
                <button type="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>

<?php
    include '../partials/footer.php';
?>

    <!-- ======================= END OF FOOTER ======================== -->

    <script src="<?= ROOT_URL ?>js/main.js"></script>

</body>
</html>