
<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="footer_copyright">
                    &copy; <span id="currentYear"></span>
                </div>
            </div><!--- END COL -->
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</div>


<script>
    const CY = new Date().getUTCFullYear();
    document.getElementById("currentYear").textContent = CY;
</script>
