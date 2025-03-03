<?= $this->include('load/toggle') ?>
<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesCartaPorte/dataHeadCartaPorte') ?>
<?= $this->include('modulesCartaPorte/productosModalCartaPorte') ?>
<?= $this->include('modulesCartaPorte/mercanciasModalCartaPorte') ?>
<?= $this->include('modulesCartaPorte/modalCaptureUbicaciones') ?>
<?= $this->include('modulesCartaPorte/modalPayment') ?>
<?= $this->include('modulesCartaPorte/moreInfoRow') ?>
<?= $this->include('modulesCartaPorte/moreInfoRowMercancias') ?>
<?= $this->include('modulesProducts/modalCaptureProducts') ?>
<?= $this->include('modulesCustumers/modalCaptureCustumers') ?>
<?= $this->include('modulesChoferes/modalCaptureChoferes') ?>
<?= $this->include('modulesVehiculos/modalCaptureVehiculos') ?>
<?= $this->include('modulesRemolques/modalCaptureRemolques') ?>

<?= $this->endSection() ?>
