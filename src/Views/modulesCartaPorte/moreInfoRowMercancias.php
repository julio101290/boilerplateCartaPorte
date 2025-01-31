<!-- Modal More Info -->
<div class="modal fade" id="modelMoreInfoRowMercancia" tabindex="-1" role="dialog" aria-labelledby="modelMoreInfoRow" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Información del Renglon de la mercancia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-otrosDatosRenglon" class="form-horizontal">




                    <div class="form-group row">
                        <label for="unidadSATRowMercancia" class="col-sm-2 col-form-label">
                            Clave Unidad SAT
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select name="unidadSATRowMercancia" id="unidadSATRowMercancia" style="width: 90%;" class="form-control unidadSATRowMercancia form-controlProducts">
                                    <option value="0" selected>
                                        Seleccione Clave De Unidad SAT
                                    </option>
                                </select>


                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="claveProductoSATRowMercancia" class="col-sm-2 col-form-label">
                            Bienes Transp
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select name="claveProductoSATRowMercancia" id="claveProductoSATRowMercancia" style="width: 90%;" class="form-control claveProductoSATRowMercancia form-controlProducts">
                                    <option value="0" selected>
                                        Seleccione Bienes Transp
                                    </option>

                                </select>


                            </div>
                        </div>

                    </div>




                    <div class="form-group row">
                        <label for="unidadProductoMercancia" class="col-sm-2 col-form-label">
                            Unidad Producto
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input name="unidadProductoMercancia" id="unidadProductoMercancia" class="form-control unidadProductoMercancia form-controlProducts">

                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="pesoEnKG" class="col-sm-2 col-form-label">
                            Peso En KG
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input name="pesoEnKG" id="pesoEnKG" class="form-control pesoEnKG form-controlProducts">

                            </div>
                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="materialPeligroso" class="col-sm-2 col-form-label">
                            Meterial Peligroso
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select id="materialPeligroso" name="materialPeligroso" class="materialPeligroso">

                                    <option value="Si" >Si</option>
                                    <option value="No">No </option>
                                </select>


                            </div>
                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="idOrigenMercancia" class="col-sm-2 col-form-label">
                            Origen Mercancia
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input name="idOrigenMercancia" id="idOrigenMercancia" class="form-control idOrigenMercancia form-controlProducts">

                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="idDestinoMercancia" class="col-sm-2 col-form-label">
                            Destino Mercancia
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input name="idDestinoMercancia" id="idDestinoMercancia" class="form-control idDestinoMercancia form-controlProducts">

                            </div>
                        </div>

                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm btnGuardarRenglonMercancia" id="btnGuardarRenglonMercancia"  data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>
    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnGuardarRenglonMercancia', function (e) {

        console.log("BOTON GUARDAR",$(".claveProductoSATRowMercancia").val());
        nombreDiv.parent().parent().find(".claveUnidadSatMercanciaR").val($(".unidadSATRowMercancia").val());
        
        console.log("Guardado ", nombreDiv.parent().parent().find(".claveUnidadSatMercanciaR").val());
        nombreDiv.parent().parent().find(".claveProductoSATRMercanciaR").val($(".claveProductoSATRowMercancia").val());
        nombreDiv.parent().parent().find(".unidadMercanciaR").val($(".unidadProductoMercancia").val());
        nombreDiv.parent().parent().find(".pesoEnKgR").val($(".pesoEnKG").val());
        nombreDiv.parent().parent().find(".materialPeligrosoR").val($(".materialPeligroso").val());
        nombreDiv.parent().parent().find(".idDestinoMercanciaR").val($(".idOrigenMercancia").val());
        nombreDiv.parent().parent().find(".idOrigenMercanciaR").val($(".idDestinoMercancia ").val());

        listMercancias();
    });



    /**
     * Categorias por empresa
     */

    $(".unidadSATRowMercancia").select2({
        ajax: {
            url: "<?= base_url('admin/products/getUnidadSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },

            cache: true
        }
    });


    /**
     * Categorias por empresa
     */

    $(".claveProductoSATRowMercancia").select2({
        ajax: {
            url: "<?= base_url('admin/products/getProductosSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var idEmpresa = $('.idEmpresa').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    idEmpresa: idEmpresa // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },
            cache: true
        }
    });
</script>


<?= $this->endSection() ?>