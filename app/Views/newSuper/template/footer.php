</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
<footer class="footer border-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © SheepMembers.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Paulo Henrique.
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!--start back-to-top
<button onclick="topFunction()" class="btn btn-primary btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>-->
<!--end back-to-top-->
<!-- JAVASCRIPT -->
<script src="<?= url_cloud_front() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= url_cloud_front() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= url_cloud_front() ?>assets/js/plugins.js"></script>
<?= $this->renderSection('jstemplate') ; ?>
<!-- App js -->
<script src="<?= url_cloud_front() ?>assets/js/app.js"></script>
<script>
    const baseUrl = window.location.origin;
</script>
<?= $this->renderSection('js') ; ?>
</body>
</html>