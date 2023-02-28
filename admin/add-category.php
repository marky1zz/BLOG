<?php
    include 'partials/header.php';
?>
    <!-- ======================= END OF NAV ======================== -->


    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign In</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="">
                <input type="text" placeholder="Title">
                <textarea rows="4" placeholder="Description"></textarea>
                <button type="submit" class="btn">Add Category</button>
                
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

