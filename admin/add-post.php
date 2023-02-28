<?php
    include 'partials/header.php';
?>
    <!-- ======================= END OF NAV ======================== -->


    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Post</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="Title">
                <select>
                    <option value="1">Travel</option>
                    <option value="1">Art</option>
                    <option value="1">Science & Technology</option>
                    <option value="1">Food</option>
                    <option value="1">Travel</option>
                    <option value="1">Travel</option>
                </select>
                <div class="form_control inline" >
                    <input type="checkbox" id="is_featured">
                    <label for="is_featured" checked="1">Featured</label>
                </div>
                <div class="form_control">
                    <label for="thumbnail">Add thumbnail</label>
                    <input type="file" id="thumbnail">
                </div>
                <textarea rows="10" placeholder="Body"></textarea>
                <button type="submit" class="btn">Add Post</button>
                
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