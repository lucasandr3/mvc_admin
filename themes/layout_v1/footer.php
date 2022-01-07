<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">&copy; <?= date('Y'); ?><a
                    class="ml-25" href="javascript:void(0)" target="_blank">MLV Tecnologia</a><span
                    class="d-none d-sm-inline-block"></span></span><span class="float-md-right d-none d-md-block">Versão 1.0.0</span>
    </p>
</footer>
<button class="btn btn-success btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="<?= url('resources/app/vendors/js/vendors.min.js') ?>"></script>
<script src="<?= url('resources/js/scripts.js') ?>"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!--    <script src="--><? //=url('resources/app/vendors/js/charts/apexcharts.min.js')?><!--"></script>-->


<!--    <script src="--><? //=url('resources/app/vendors/js/extensions/toastr.min.js')?><!--"></script>-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= url('resources/app/js/core/app-menu.js') ?>"></script>
<script src="<?= url('resources/app/js/core/app.js') ?>"></script>
<script src="<?= url('resources/app/js/scripts/customizer.js') ?>"></script>
<!--<script src="--><?//= url('resources/js/jquery.mask.min.js') ?><!--"></script>-->
<!--<script src="--><?//= url('resources/js/mascaras.js') ?><!--"></script>-->
<script src="<?= url('resources/app/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<!-- END: Theme JS-->


<script src="<?=url('resources/app/js/scripts/components/components-modals.min.js')?>"></script>

<!-- BEGIN: Page JS-->
<!--    <script src="--><? //=url('resources/app/js/scripts/pages/dashboard-ecommerce.js')?><!--"></script>-->
<!-- END: Page JS-->

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
