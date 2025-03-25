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

                                    <option value="" >Sin Especificar</option>
                                    <option value="Si" >Si</option>
                                    <option value="No">No </option>
                                </select>


                            </div>
                        </div>

                    </div>



                    <div class="form-group row">
                        <label for="claveProductoSATMaterialPeligroso" class="col-sm-2 col-form-label">
                            Clave Material Peligroso
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select name="claveProductoSATMaterialPeligroso" id="claveProductoSATMaterialPeligroso" style="width: 90%;" class="form-control claveProductoSATMaterialPeligroso form-controlProducts">
                                    <option value="0" selected>
                                        Seleccione Clave Material Peligroso
                                    </option>

                                </select>


                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="claveProductoSATMaterialPeligroso" class="col-sm-2 col-form-label">

                            Tipo Embalaje

                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select name="claveTipoEmbalaje" id="claveTipoEmbalaje" style="width: 90%;" class="form-control claveTipoEmbalaje form-controlProducts">
                                    <option value="">***** Vacio *****</option>
                                    <option value="1A1">1A1 Bidones (Tambores) de Acero 1 de tapa no desmontable</option>
                                    <option value="1A2">1A2 Bidones (Tambores) de Acero 1 de tapa desmontable</option>
                                    <option value="1B1">1B1 Bidones (Tambores) de Aluminio de tapa no desmontable</option>
                                    <option value="1B2">1B2 Bidones (Tambores) de Aluminio de tapa desmontable</option>
                                    <option value="1D">1D Bidones (Tambores) de Madera contrachapada</option>
                                    <option value="1G">1G Bidones (Tambores) de Cartón</option>
                                    <option value="1H1">1H1 Bidones (Tambores) de Plástico de tapa no desmontable</option>
                                    <option value="1H2">1H2 Bidones (Tambores) de Plástico de tapa desmontable</option>
                                    <option value="1N1">1N1 Bidones (Tambores) de Metal que no sea acero ni aluminio de tapa no desmontable</option>
                                    <option value="1N2">1N2 Bidones (Tambores) de Metal que no sea acero ni aluminio de tapa desmontable</option>
                                    <option value="3A1">3A1 Jerricanes (Porrones) de Acero de tapa no desmontable</option>
                                    <option value="3A2">3A2 Jerricanes (Porrones) de Acero de tapa desmontable</option>
                                    <option value="3B1">3B1 Jerricanes (Porrones) de Aluminio de tapa no desmontable</option>
                                    <option value="3B2">3B2 Jerricanes (Porrones) de Aluminio de tapa desmontable</option>
                                    <option value="3H1">3H1 Jerricanes (Porrones) de Plástico de tapa no desmontable</option>
                                    <option value="3H2">3H2 Jerricanes (Porrones) de Plástico de tapa desmontable</option>
                                    <option value="4A">4A Cajas de Acero</option>
                                    <option value="4B">4B Cajas de Aluminio</option>
                                    <option value="4C1">4C1 Cajas de Madera natural ordinaria</option>
                                    <option value="4C2">4C2 Cajas de Madera natural de paredes a prueba de polvos (estancas a los pulverulentos)</option>
                                    <option value="4D">4D Cajas de Madera contrachapada</option>
                                    <option value="4F">C4F ajas de Madera reconstituida</option>
                                    <option value="4G">4G Cajas de Cartón</option>
                                    <option value="4H1">4H1 Cajas de Plástico Expandido</option>
                                    <option value="4H2">4H2 Cajas de Plástico Rígido</option>
                                    <option value="5H1">5H1 Sacos (Bolsas) de Tejido de plástico sin forro ni revestimientos interiores</option>
                                    <option value="5H2">5H2 Sacos (Bolsas) de Tejido de plástico a prueba de polvos (estancos a los pulverulentos)</option>
                                    <option value="5H3">5H3 Sacos (Bolsas) de Tejido de plástico resistente al agua</option>
                                    <option value="5H4">5H4 Sacos (Bolsas) de Película de plástico</option>
                                    <option value="5L1">5L1 Sacos (Bolsas) de Tela sin forro ni revestimientos interiores</option>
                                    <option value="5L2">5L2 Sacos (Bolsas) de Tela a prueba de polvos (estancos a los pulverulentos)</option>
                                    <option value="5L3">5L3 Sacos (Bolsas) de Tela resistentes al agua</option>
                                    <option value="5M1">5M1 Sacos (Bolsas) de Papel de varias hojas</option>
                                    <option value="5M2">5M2 Sacos (Bolsas) de Papel de varias hojas, resistentes al agua</option>
                                    <option value="6HA1">6HA1 Envases y embalajes compuestos de Recipiente de plástico, con bidón (tambor) de acero</option>
                                    <option value="6HA2">E6HA2 nvases y embalajes compuestos de Recipiente de plástico, con una jaula o caja de acero</option>
                                    <option value="6HB1">6HB1 Envases y embalajes compuestos de Recipiente de plástico, con un bidón (tambor) exterior de aluminio</option>
                                    <option value="6HB2">6HB2 Envases y embalajes compuestos de Recipiente de plástico, con una jaula o caja de aluminio</option>
                                    <option value="6HC">6HC Envases y embalajes compuestos de Recipiente de plástico, con una caja de madera</option>
                                    <option value="6HD1">6HD1 Envases y embalajes compuestos de Recipiente de plástico, con un bidón (tambor) de madera contrachapada</option>
                                    <option value="6HD2">6HD2 Envases y embalajes compuestos de Recipiente de plástico, con una caja de madera contrachapada</option>
                                    <option value="6HG1">6HG1 Envases y embalajes compuestos de Recipiente de plástico, con un bidón (tambor) de cartón</option>
                                    <option value="6HG2">6HG2 Envases y embalajes compuestos de Recipiente de plástico, con una caja de cartón</option>
                                    <option value="6HH1">6HH1 Envases y embalajes compuestos de Recipiente de plástico, con un bidón (tambor) de plástico</option>
                                    <option value="6HH2">6HH2 Envases y embalajes compuestos de Recipiente de plástico, con caja de plástico rígido</option>
                                    <option value="6PA1">6PA1 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con un bidón (tambor) de acero</option>
                                    <option value="6PA2">6PA2 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con una jaula o una caja de acero</option>
                                    <option value="6PB1">6PB1 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con un bidón (tambor) exterior de aluminio</option>
                                    <option value="6PB2">6PB2 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con una jaula o una caja de aluminio</option>
                                    <option value="6PC">6PC Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con una caja de madera</option>
                                    <option value="6PD1">6PD1 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con bidón (tambor) de madera contrachapada</option>
                                    <option value="6PD1">6PD1 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con bidón (tambor) de madera contrachapada</option>
                                    <option value="6PD2">6PD2 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con canasta de mimbre</option>
                                    <option value="6PG1">6PG1 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con un bidón (tambor) de cartón</option>
                                    <option value="6PG2">6PG2 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con una caja de cartón</option>
                                    <option value="6PH1">6PH1 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con un envase y embalaje de plástico</option>
                                    <option value="6PH2">6PH2 Envases y embalajes compuestos de Recipiente de vidrio, porcelana o de gres, con un envase y embalaje de plástico rígido</option>
                                    <option value="7H1">7H1 Bultos de Plástico</option>
                                    <option value="7L1">7L1 Bultos de Tela</option>
                                    <option value="Z01">Z01 No aplica</option>
                                </select>


                            </div>
                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="pesoEnKG" class="col-sm-2 col-form-label">
                            Descripción Embalaje
                        </label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input name="descripcionEmbalaje" id="descripcionEmbalaje" class="form-control descripcionEmbalaje form-controlProducts">

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



        console.log("BOTON GUARDAR", $(".claveProductoSATRowMercancia").val());
        nombreDiv.parent().parent().find(".claveUnidadSatMercanciaR").val($(".unidadSATRowMercancia").val());

        console.log("Guardado ", nombreDiv.parent().parent().find(".claveUnidadSatMercanciaR").val());
        nombreDiv.parent().parent().find(".claveProductoSATRMercanciaR").val($(".claveProductoSATRowMercancia").val());
        nombreDiv.parent().parent().find(".unidadMercanciaR").val($(".unidadProductoMercancia").val());
        nombreDiv.parent().parent().find(".pesoEnKgR").val($(".pesoEnKG").val());
        nombreDiv.parent().parent().find(".materialPeligrosoR").val($(".materialPeligroso").val());
        nombreDiv.parent().parent().find(".idDestinoMercanciaR").val($(".idOrigenMercancia").val());
        nombreDiv.parent().parent().find(".idOrigenMercanciaR").val($(".idDestinoMercancia").val());
        nombreDiv.parent().parent().find(".claveProductoSATMaterialPeligrosoR").val($(".claveProductoSATMaterialPeligroso").val());
        nombreDiv.parent().parent().find(".claveProductoSATMaterialPeligrosoDescripcionR").val($(".claveProductoSATMaterialPeligroso option:selected").text());

        nombreDiv.parent().parent().find(".claveTipoEmbalajeR").val($(".claveTipoEmbalaje").val());
        nombreDiv.parent().parent().find(".descripcionEmbalajeR").val($(".descripcionEmbalaje").val());

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


    /**
     * Categorias por empresa
     */

    $(".claveProductoSATMaterialPeligroso").select2({
        ajax: {
            url: "<?= base_url('admin/cartaPorte/getMaterialPeligrosoSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash // CSRF Token
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


    $(".claveTipoEmbalaje").select2();

</script>


<?= $this->endSection() ?>