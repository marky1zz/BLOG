<?php
    include 'partials/header.php';
?>
    <!-- ======================= END OF NAV ======================== -->


    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Category</h2>
            <form action="">
                <input type="text" placeholder="Title">
                <textarea rows="4" placeholder="Description"></textarea>
                <button type="submit" class="btn">Update Category</button>
                
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

