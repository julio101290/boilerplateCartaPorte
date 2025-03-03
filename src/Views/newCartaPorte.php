<?= $this->include('julio101290\boilerplate\Views\load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatecartaporte\Views\modulesCartaPorte/dataHeadCartaPorte') ?>
<?= $this->include('julio101290\boilerplatecartaporte\Views\modulesCartaPorte/productosModalCartaPorte') ?>
<?= $this->include('julio101290\boilerplatecartaporte\Views\modulesCartaPorte/mercanciasModalCartaPorte') ?>
<?= $this->include('julio101290\boilerplatecartaporte\Views\modulesCartaPorte/modalCaptureUbicaciones') ?>
<?= $this->include('julio101290\boilerplatecartaporte\Views\modulesCartaPorte/modalPayment') ?>
<?= $this->include('julio101290\boilerplatecartaporte\Views\modulesCartaPorte/moreInfoRow') ?>
<?= $this->include('julio101290\boilerplatecartaporte\Views\modulesCartaPorte/moreInfoRowMercancias') ?>
<?= $this->include('julio101290\boilerplateproducts\Views\modulesProducts/modalCaptureProducts') ?>
<?= $this->include('julio101290\boilerplatecustumers\Views\modulesCustumers/modalCaptureCustumers') ?>
<?= $this->include('julio101290\boilerplatedrivers\Views\modulesChoferes/modalCaptureChoferes') ?>
<?= $this->include('julio101290\boilerplatevehicles\Views\modulesVehiculos/modalCaptureVehiculos') ?>
<?= $this->include('julio101290\boilerplateremolques\Views\modulesRemolques/modalCaptureRemolques') ?>

<?= $this->endSection() ?>
