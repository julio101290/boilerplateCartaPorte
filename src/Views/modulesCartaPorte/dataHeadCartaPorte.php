<div class="row">

    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Encabezado</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>



            <div class="card-body">


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="generales-tab" data-toggle="tab" data-target="#generales" type="button" role="tab" aria-controls="generales" aria-selected="true">Generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#otrosDatos" type="button" role="tab" aria-controls="otrosDatos" aria-selected="false">Ubicaciones
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#datosExtraVehiculo" type="button" role="tab" aria-controls="datosExtraVehiculo" aria-selected="false">
                            Datos Extra Vehiculo
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#facturacionMX" type="button" role="tab" aria-controls="facturacionMX" aria-selected="false">
                            Facturación MX
                        </button>
                    </li>



                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="generales" role="tabpanel" aria-labelledby="generales">

                        <?= $this->include('modulesCartaPorte/generalCartaPorte') ?>

                    </div>

                    <div class="tab-pane fade" id="otrosDatos" role="tabpanel" aria-labelledby="otrosDatos">

                        <?= $this->include('modulesCartaPorte/otrosDatos') ?>

                    </div>

                    <div class="tab-pane fade" id="datosExtraVehiculo" role="tabpanel" aria-labelledby="datosExtraVehiculo">

                        <?= $this->include('modulesCartaPorte/datosExtrasVehiculos') ?>

                    </div>


                    <div class="tab-pane fade" id="facturacionMX" role="tabpanel" aria-labelledby="otrosDatos">

                        <?= $this->include('modulesCartaPorte/facturacionMX') ?>

                    </div>



                </div>


            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Detalle de la venta</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>

                <div class="card-body">
                    <div class="row">


                        <div class="col-md-12">

                            <div class="box-body">

                                <div class="box" style="overflow-y: scroll; height:250px;">




                                    <div class="row">

                                        <!--=====================================
                                    ENCABEZADO
                                    ======================================-->
                                        <div class="col-1"> # </div>
                                        <div class="col-1"> Codigo </div>
                                        <div class="col-7"> Descripción </div>
                                        <div class="col-1">Cantidad </div>
                                        <div class="col-1">Precio </div>
                                        <div class="col-1">Total </div>


                                    </div>
                                    <hr class="hr" />
                                    <!--=====================================
                                ENTRADA PARA AGREGAR PRODUCTO
                                ======================================-->
                                    <div class="rowProducts">

                                        <?php
                                        if (isset($listProducts)) {

                                            $list = "";
                                            foreach ($listProducts as $key => $value) {


                                                if (!isset($value["porcentIVARetenido"])) {

                                                    $value["porcentIVARetenido"] = "0.00";
                                                }


                                                if (!isset($value["IVARetenido"])) {

                                                    $value["IVARetenido"] = "0.00";
                                                }

                                                if (!isset($value["porcentISRRetenido"])) {

                                                    $value["porcentISRRetenido"] = "0.00";
                                                }

                                                if (!isset($value["ISRRetenido"])) {

                                                    $value["ISRRetenido"] = "0.00";
                                                }

                                                if (!isset($value["claveProductoSAT"])) {

                                                    $value["claveProductoSAT"] = "";
                                                }

                                                if (!isset($value["claveUnidadSAT"])) {

                                                    $value["claveUnidadSAT"] = "";
                                                }


                                                if (!isset($value["unidad"])) {

                                                    $value["unidad"] = "";
                                                }

                                                if (!isset($value["lote"])) {

                                                    $value["lote"] = "";
                                                }

                                                if (!isset($value["idAlmacen"])) {

                                                    $value["idAlmacen"] = "";
                                                }

                                                $list .= <<<EOF
                                                    
                                                <div class="form-group row nuevoProduct"><div class="col-1"> <button type="button" class="btn btn-danger quitProduct"><span class="far fa-trash-alt"></button>
                                                <button type="button"  data-toggle="modal" data-target="#modelMoreInfoRow" class="btn btn-primary  btnInfo" ><span class="fa fa-fw fa-pencil-alt"></span></button>
                                                </div>
                                                <div class="col-1"> <input type="text" id="codeProduct" class="form-control codeProduct" name="codeProduct" value="$value[codeProduct]" required=""> 
                                                <input type="hidden" id="claveProductoSATR" class="form-control claveProductoSATR"  name="claveProductoSATR" value="$value[claveProductoSAT]" required="">
                                                <input type="hidden" id="claveUnidadSatR" class="form-control claveUnidadSatR"  name="claveUnidadSatR" value="$value[claveUnidadSAT]" required="">
                                                <input type="hidden" id="unidad" class="form-control unidad"  name="unidad" value="$value[unidad]" required="">
                                                <input type="hidden" id="lote" class="form-control lote"  name="lote" value="$value[lote]" required="">    
                                                <input type="hidden" id="idAlmacen" class="form-control idAlmacen"  name="idAlmacen" value="$value[idAlmacen]" required="">    
                                                </div>
                                                <div class="col-7"> <input type="text" id="description" class="form-control description" idproducto="$value[idProduct]" name="description" value="$value[description]" required=""> </div>
                                                <div class="col-1"> <input type="number" id="cant" class="form-control cant" name="cant" value="$value[cant]" required=""> 
                                                
                                                <input type="hidden" id="porcentIVARetenido" class="form-control porcentIVARetenido" name="porcentIVARetenido" value="$value[porcentIVARetenido]" required="">
                                                <input type="hidden" id="porcentISRRetenido" class="form-control porcentISRRetenido" name="porcentISRRetenido" value="$value[porcentISRRetenido]" required="">
                                                <input type="hidden" id="porcentTax" class="form-control porcentTax" name="porcentTax" value="$value[porcentTax]" required=""></div>
                                                <div class="col-1"> <input type="number" id="price" class="form-control price" name="price" value="$value[price]" required="">
                                                
                                                <input type="hidden" id="IVARetenido" class="form-control IVARetenido" name="IVARetenido" value="$value[IVARetenido]" required="">
                                                <input type="hidden" id="ISRRetenido" class="form-control ISRRetenido" name="ISRRetenido" value="$value[ISRRetenido]" required="">
                                                
                                                <input type="hidden" id="tax" class="form-control tax" name="tax" value="$value[tax]" required=""> </div>
                                                <div class="col-1"> <input readonly="" type="number" id="total" class="form-control total" name="total" value="$value[total]" required="">
                                                <input type="hidden" id="neto" class="form-control neto" name="neto" value="$value[neto]" required="">
                                                </div></div>
                                                    
                                                    
                                            EOF;
                                            }

                                            echo $list;
                                        }
                                        ?>

                                    </div>

                                    <input type="hidden" id="listProducts" name="listProducts" value="[]">
                                    <!--=====================================
                                BOTÓN PARA AGREGAR PRODUCTO
                                ======================================-->


                                    <hr>
                                </div>
                            </div>


                            <div class="box-body">

                                <div class="box" style="overflow-y: scroll; height:250px;">




                                    <div class="row">

                                        <!--=====================================
                                    ENCABEZADO
                                    ======================================-->
                                        <div class="col-1"> # </div>
                                        <div class="col-1">Codigo </div>
                                        <div class="col-7"> Descripción </div>
                                        <div class="col-1">Cantidad </div>



                                    </div>
                                    <hr class="hr" />
                                    <!--=====================================
                                ENTRADA PARA AGREGAR PRODUCTO
                                ======================================-->
                                    <div class="rowMercancias">

                                        <?php
                                        if (isset($listaMercancias)) {

                                            $list = "";
                                            foreach ($listaMercancias as $key => $value) {




                                                $list .= <<<EOF
                                                    
                                                <div class="form-group row nuevoMercancia"><div class="col-1"> 
                                                    <button type="button" class="btn btn-danger quitProduct"><span class="far fa-trash-alt"></span></button>  
                                                    <button type="button" data-toggle="modal" data-target="#modelMoreInfoRowMercancia" class="btn btn-primary  btnInfoMercancias"><span class="fa fa-fw fa-pencil-alt"></span></button>
                                                </div>
                                                <div class="col-1"> 
                                                   <input type="hidden" id="claveProductoSATRMercancia" class="form-control claveProductoSATRMercanciaR" name="claveProductoSATRMercanciaR" value="$value[BienesTransp]" required="">
                                                   <input type="hidden" id="claveUnidadSatMercanciaR" class="form-control claveUnidadSatMercanciaR" name="claveUnidadSatMercanciaR" value="$value[ClaveUnidad]" required="">
                                                   <input type="hidden" id="unidadMercanciaR" class="form-control unidadMercanciaR" name="unidadMercanciaR" value="$value[Unidad]" required="">
                                                   <input type="hidden" id="pesoEnKgR" class="form-control pesoEnKgR" name="pesoEnKgR" value="$value[PesoEnKg]" required="">
                                                   <input type="hidden" id="materialPeligrosoR" class="form-control materialPeligrosoR" name="materialPeligrosoR" value="$value[MaterialPeligroso]" required="">
                                                   <input type="hidden" id="idDestinoMercanciaR" class="form-control idDestinoMercanciaR" name="idDestinoMercanciaR" value="$value[IDDestino]" required="">
                                                   <input type="hidden" id="idOrigenMercanciaR" class="form-control idOrigenMercanciaR" name="idOrigenMercanciaR" value="$value[IDOrigen]" required="">
                                                   <input type="text" id="codeProductMercanciaR" class="form-control codeProductMercanciaR" name="codeProductMercanciaR" value="$value[codeProductMercanciaR]" required=""> 
                                                </div>
                                                <div class="col-7"> 
                                                    <input type="text" id="descriptionMercanciasCartaPorte" class="form-control descriptionMercanciasCartaPorte" idproducto="$value[idproducto]" name="descriptionMercanciasCartaPorte" value="$value[Descripcion]" required=""> 
                                                </div>
                                                <div class="col-1"> 
                                                    <input type="number" id="cantR" class="form-control cantR" name="cantR" value="$value[Cantidad]" required="">
                                                 </div>
                                                     </div>
                                                    
                                                    
                                            EOF;
                                            }

                                            echo $list;
                                        }
                                        ?>

                                    </div>

                                    <input type="hidden" id="listMercancias" name="listaMercancias" value="[]">
                                    <!--=====================================
                                BOTÓN PARA AGREGAR PRODUCTO
                                ======================================-->


                                    <hr>
                                </div>
                            </div>


                            <!-- Mercancias -->




                            <div class="box-footer" style="
                                 text-align: right;
                                 ">
                                <div class="row form-group">

                                    <div class="col-7">

                                    </div>
                                    <div class="col-3" style="
                                         vertical-align: middle;
                                         ">
                                        <label style="vertical-align: sub;margin-bottom: 0px;">Sub Total:</label>
                                    </div>

                                    <div class="col-2">
                                        <input readonly="" type="text" id="subTotal" class="form-control subTotal" name="subTotal" value="<?= $subTotal ?>" style="
                                               text-align: right;
                                               ">
                                    </div>


                                </div>


                                <div class="row form-group">

                                    <div class="col-7">

                                    </div>
                                    <div class="col-3" style="
                                         vertical-align: middle;
                                         ">
                                        <label style="
                                               vertical-align: sub;
                                               ">Impuesto:</label>
                                    </div>

                                    <div class="col-2">
                                        <input readonly="" type="text" id="totalImpuesto" class="form-control totalImpuesto" name="totalImpuesto" value="<?= $taxes ?>" style="
                                               text-align: right;
                                               ">
                                    </div>


                                </div>


                                <div class="row form-group grupoTotalRetencionIVA" hidden>

                                    <div class="col-7">

                                    </div>
                                    <div class="col-3" style="
                                         vertical-align: middle;
                                         ">
                                        <label style="
                                               vertical-align: sub;
                                               ">Retencion IVA:</label>
                                    </div>

                                    <div class="col-2">
                                        <input readonly="" type="text" id="totalRetencionIVA" class="form-control totalRetencionIVA" name="totalRetencionIVA" value="<?= $IVARetenido ?>" style="
                                               text-align: right;
                                               ">
                                    </div>


                                </div>


                                <div class="row form-group grupoTotalRetencionISR" hidden>

                                    <div class="col-7">

                                    </div>
                                    <div class="col-3" style="
                                         vertical-align: middle;
                                         ">
                                        <label style="
                                               vertical-align: sub;
                                               ">Retencion ISR:</label>
                                    </div>

                                    <div class="col-2">
                                        <input readonly="" type="text" id="totalRetencionISR" class="form-control totalRetencionISR" name="totalRetencionISR" value="<?= $ISRRetenido ?>" style="
                                               text-align: right;
                                               ">
                                    </div>


                                </div>

                                <div class="row form-group">

                                    <div class="col-7">

                                    </div>
                                    <div class="col-3" style="
                                         vertical-align: middle;
                                         ">
                                        <label style="
                                               vertical-align: sub;
                                               ">Total:</label>
                                    </div>

                                    <div class="col-2">
                                        <input readonly="" type="text" id="granTotal" class="form-control granTotal" name="granTotal" value="<?= $total ?>" style="
                                               text-align: right;
                                               ">
                                    </div>


                                </div>


                                <button type="button" class="btn btn-primary pull-right btnSaveCartaPorte" data-toggle="modal">
                                    <i class="fa far fa-save"> </i>Guardar</button>

                                <button type="button" class="btn bg-maroon btnPrint" data-toggle="modal" required="" data-placement="top" title="Imprimir">
                                    <i class="fa fa-print"> </i> Guardar, Imprimir y cerrar
                                </button>

                                <button type="button" class="btn bg-maroon btnTimbrar" data-toggle="modal" required="" data-placement="top" title="Timbrar">
                                    <i class="fas fa-qrcode"> </i> Timbrar
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- comment -->



        </div>
    </div>





    <?= $this->section('js') ?>


    <script>
        $("#metodoPagoVenta").select2();
        $("#usoCFDIVenta").select2();
        $("#formaPagoVenta").select2();
        $("#regimenFiscalReceptor").select2();
        $("#TranspInternac").select2();

        /**
         * Obtiene el ultimo folio por almacen
         */

        $("#idEmpresaSells").on("change", function () {


            var idEmpresa = $(this).val();
            var idSucursal = $("#idSucursal").val();

            var datos = new FormData();
            datos.append("idEmpresa", idEmpresa);

            // TRAE ULTIMO FOLIO
            $.ajax({

                url: "<?= base_url('admin/cartaPorte/getLastCode') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    console.log(respuesta);

                    $("#codeSell").val(respuesta["folio"]);


                }

            });



            //TRAE DATOS EMPRESA

            $.ajax({

                url: "<?= base_url('admin/empresas/obtenerEmpresa') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    console.log(respuesta);
                    if (respuesta["facturacionRD"] == "on") {

                        $(".comprobantesRD").removeAttr("hidden");

                    } else {

                        $(".comprobantesRD").attr("hidden", true);

                    }





                }

            });



        });


        $("#idSucursal").on("change", function () {


            var idEmpresa = $("#idEmpresaSells").val();
            var idSucursal = $(this).val();

            console.log("idSucursal", idSucursal);

            var datos = new FormData();
            datos.append("idEmpresa", idEmpresa);
            datos.append("idSucursal", idSucursal);

            // TRAE ULTIMO FOLIO
            $.ajax({

                url: "<?= base_url('admin/cartaPorte/getLastCode') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {



                    $("#codeSell").val(respuesta["folio"]);


                }

            });

        });


        $(document).on('click', '#btnSaveChoferes', function (e) {


            var idChoferes = $("#idChoferes").val();
            var idEmpresa = $("#idEmpresaChoferes").val();
            var nombre = $("#nombre").val();
            var Apellido = $("#Apellido").val();
            var tipoFigura = $("#tipoFigura").val();
            var RFCFigura = $("#RFCFigura").val();
            var numLicencia = $("#numLicencia").val();

            var codigoPostalChofer = $("#codigoPostalChofer").val();
            var paisChofer = $("#paisChofer").val();
            var estadoChofer = $("#estadoChofer").val();
            var municipioChofer = $("#municipioChofer").val();


            if (idEmpresa == 0 || idEmpresa == null) {

                Toast.fire({
                    icon: 'error',
                    title: "Tiene que seleccionar la empresa"
                });
                return;
            }

            $("#btnSaveChoferes").attr("disabled", true);

            var datos = new FormData();
            datos.append("idChoferes", idChoferes);
            datos.append("idEmpresa", idEmpresa);
            datos.append("nombre", nombre);
            datos.append("Apellido", Apellido);
            datos.append("tipoFigura", tipoFigura);
            datos.append("RFCFigura", RFCFigura);
            datos.append("numLicencia", numLicencia);

            datos.append("CodigoPostalFigura", codigoPostalChofer);
            datos.append("PaisFigura", paisChofer);
            datos.append("EstadoFigura", estadoChofer);
//            datos.append("MunicipioFigura", municipioChofer);


            $.ajax({

                url: "<?= base_url('admin/choferes/save') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    if (respuesta.match(/Correctamente.*/)) {

                        Toast.fire({
                            icon: 'success',
                            title: "Guardado Correctamente"
                        });

                        tableChoferes.ajax.reload();
                        $("#btnSaveChoferes").removeAttr("disabled");


                        $('#modalAddChoferes').modal('hide');
                    } else {

                        Toast.fire({
                            icon: 'error',
                            title: respuesta
                        });

                        $("#btnSaveChoferes").removeAttr("disabled");


                    }

                }

            }

            )

        });

        /**
         * Obtiene el ultimo folio por almacen
         */

        $("#idEmpresaSells").on("change", function () {


            var idEmpresa = $(this).val();
            var idSucursal = $("#idSucursal").val();

            var datos = new FormData();
            datos.append("idEmpresa", idEmpresa);
            datos.append("idSucursal", idSucursal);

            // TRAE ULTIMO FOLIO
            $.ajax({

                url: "<?= base_url('admin/sells/getLastCode') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    console.log(respuesta);

                    $("#codeSell").val(respuesta["folio"]);


                }

            });



            $("#idSucursal").select2({
                ajax: {
                    url: "<?= site_url('admin/sucursales/getSucursalesAjax') ?>",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        // CSRF Hash
                        var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                        var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                        var idEmpresa = $('.idEmpresaSells').val(); // CSRF hash

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
             * Buscamos las ubicaciones destino
             
             * @returns {Boolean} */


            $("#ubicacionDestino").select2({
                ajax: {
                    url: "<?= site_url('admin/ubicaciones/getUbicacionesAjax') ?>",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        // CSRF Hash
                        var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                        var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                        var idEmpresa = $('.idEmpresaSells').val(); // CSRF hash

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


            //TRAE DATOS EMPRESA

            $.ajax({

                url: "<?= base_url('admin/empresas/obtenerEmpresa') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    console.log(respuesta);
                    if (respuesta["facturacionRD"] == "on") {

                        $(".comprobantesRD").removeAttr("hidden");

                    } else {

                        $(".comprobantesRD").attr("hidden", true);

                    }





                }

            });



        });

        $("#ubicacionOrigen").on("change", function () {

            var idUbicaciones = $(this).val();

            var datos = new FormData();
            datos.append("idUbicaciones", idUbicaciones);

            $.ajax({

                url: "<?= base_url('admin/ubicaciones/getUbicaciones') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#nombreRazonSocialOrigen").val(respuesta["nombreRazonSocial"]);
                    $("#RFCRemitenteDestinatarioOrigen").val(respuesta["RFCRemitenteDestinatario"]);
                    $("#calleOrigen").val(respuesta["calle"]);
                    $("#descripcionOrigen").val(respuesta["descripcion"]);
                    $("#numInteriorOrigen").val(respuesta["numInterior"]);
                    $("#numExteriorOrigen").val(respuesta["numExterior"]);
                    $("#coloniaOrigen").val(respuesta["colonia"]);
                    $("#localidadOrigen").val(respuesta["localidad"]);
                    $("#referenciaOrigen").val(respuesta["referencia"]);
                    $("#municipioOrigen").val(respuesta["municipio"]);
                    $("#estadoOrigen").val(respuesta["estado"]);

                    var newOption = new Option(respuesta["pais"] + ' ' + respuesta["nombrePais"], respuesta["pais"], true, true);
                    $('#paisOrigen').append(newOption).trigger('change');
                    $("#paisOrigen").val(respuesta["pais"]);

                    var newOption = new Option(respuesta["estado"] + ' ' + respuesta["nombreEstado"], respuesta["estado"], true, true);
                    $('#estadoOrigen').append(newOption).trigger('change');
                    $("#estadoOrigen").val(respuesta["estado"]);

                    var newOption = new Option(respuesta["municipio"] + ' ' + respuesta["nombreMunicipio"], respuesta["municipio"], true, true);
                    $('#municipioOrigen').append(newOption).trigger('change');
                    $("#municipioOrigen").val(respuesta["municipio"]);

                    var newOption = new Option(respuesta["localidad"] + ' ' + respuesta["nombreLocalidad"], respuesta["localidad"], true, true);
                    $('#localidadOrigen').append(newOption).trigger('change');
                    $("#localidadOrigen").val(respuesta["localidad"]);

                    var newOption = new Option(respuesta["colonia"] + ' ' + respuesta["nombreColonia"], respuesta["colonia"], true, true);
                    $('#coloniaOrigen').append(newOption).trigger('change');
                    $("#coloniaOrigen").val(respuesta["colonia"]);

                    $("#paisOrigen").val(respuesta["pais"]);
                    $("#codigoPostalOrigen").val(respuesta["codigoPostal"]);

                }

            })

        });



        $("#ubicacionDestino").on("change", function () {


            console.log("asdasd");

            var idUbicaciones = $(this).val();

            var datos = new FormData();
            datos.append("idUbicaciones", idUbicaciones);

            $.ajax({

                url: "<?= base_url('admin/ubicaciones/getUbicaciones') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {


                    $("#nombreRazonSocialDestino").val(respuesta["nombreRazonSocial"]);
                    $("#RFCRemitenteDestinatarioDestino").val(respuesta["RFCRemitenteDestinatario"]);

                    $("#calleDestino").val(respuesta["calle"]);
                    $("#descripcionDestino").val(respuesta["descripcion"]);
                    $("#numInteriorDestino").val(respuesta["numInterior"]);
                    $("#numExteriorDestino").val(respuesta["numExterior"]);
                    $("#coloniaDestino").val(respuesta["colonia"]);
                    $("#localidadDestino").val(respuesta["localidad"]);
                    $("#referenciaDestino").val(respuesta["referencia"]);
                    $("#municipioDestino").val(respuesta["municipio"]);
                    $("#estadoDestino").val(respuesta["estado"]);

                    var newOption = new Option(respuesta["pais"] + ' ' + respuesta["nombrePais"], respuesta["pais"], true, true);
                    $('#paisDestino').append(newOption).trigger('change');
                    $("#paisDestino").val(respuesta["pais"]);

                    var newOption = new Option(respuesta["estado"] + ' ' + respuesta["nombreEstado"], respuesta["estado"], true, true);
                    $('#estadoDestino').append(newOption).trigger('change');
                    $("#estadoDestino").val(respuesta["estado"]);

                    var newOption = new Option(respuesta["municipio"] + ' ' + respuesta["nombreMunicipio"], respuesta["municipio"], true, true);
                    $('#municipioDestino').append(newOption).trigger('change');
                    $("#municipioDestino").val(respuesta["municipio"]);

                    var newOption = new Option(respuesta["localidad"] + ' ' + respuesta["nombreLocalidad"], respuesta["localidad"], true, true);
                    $('#localidadDestino').append(newOption).trigger('change');
                    $("#localidadDestino").val(respuesta["localidad"]);

                    var newOption = new Option(respuesta["colonia"] + ' ' + respuesta["nombreColonia"], respuesta["colonia"], true, true);
                    $('#coloniaDestino').append(newOption).trigger('change');
                    $("#coloniaDestino").val(respuesta["colonia"]);

                    $("#paisDestino").val(respuesta["pais"]);
                    $("#codigoPostalDestino").val(respuesta["codigoPostal"]);

                }

            }).fail(function (jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 0) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "No hay conexión.!" + jqXHR.responseText
                    });

                } else if (jqXHR.status == 404) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Requested page not found [404]" + jqXHR.responseText
                    });

                } else if (jqXHR.status == 500) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Internal Server Error [500]." + jqXHR.responseText
                    });

                } else if (textStatus === 'parsererror') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Requested JSON parse failed." + jqXHR.responseText
                    });


                } else if (textStatus === 'timeout') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Time out error." + jqXHR.responseText
                    });

                } else if (textStatus === 'abort') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ajax request aborted." + jqXHR.responseText
                    });



                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: 'Uncaught Error: ' + jqXHR.responseText
                    });



                }
            })


        })

        $("#idEmpresaSells").select2();

        // Initialize select2 storages
        $("#custumerSell").select2({
            ajax: {
                url: "<?= site_url('admin/custumers/getCustumersAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                    var idEmpresa = $('.idEmpresaSells').val(); // CSRF hash

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



        // Initialize select2 storages
        $("#idSucursal").select2({
            ajax: {
                url: "<?= site_url('admin/sucursales/getSucursalAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                    var idEmpresa = $('.idEmpresaSells').val(); // CSRF hash

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
         * Get data Custumer on change
         */

        $("#custumerSell").on("change", function () {


            var idCustumer = $(this).val();

            var datos = new FormData();
            datos.append("idCustumers", idCustumer);

            // TRAE ULTIMO FOLIO
            $.ajax({

                url: "<?= base_url('admin/custumers/getCustumers') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {


                    console.log(respuesta);

                    $("#RFCReceptor").val(respuesta["taxID"]);
                    $("#razonSocialReceptor").val(respuesta["razonSocial"]);
                    $("#codigoPostalReceptor").val(respuesta["codigoPostal"]);
                    $("#usoCFDIVenta").val(respuesta["usoCFDI"]);
                    $("#usoCFDIVenta").trigger("change");
                    $("#metodoPagoVenta").val(respuesta["metodoPago"]);
                    $("#metodoPagoVenta").trigger("change");
                    $("#formaPagoVenta").val(respuesta["formaPago"]);
                    $("#formaPagoVenta").trigger("change");
                    $("#regimenFiscalReceptor").val(respuesta["regimenFiscal"]);
                    $("#regimenFiscalReceptor").trigger("change");


                }

            });

        });





        $("#idEmpresaVehiculos").select2();

        // Initialize select2 storages
        $("#idChoferSell").select2({
            ajax: {
                url: "<?= site_url('admin/choferes/getChoferesAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                    var idEmpresa = $('.idEmpresaSells').val(); // CSRF hash

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



        $("#idRemolqueCartaPorte").select2({
            ajax: {
                url: "<?= site_url('admin/remolques/getRemolquesAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                    var idEmpresa = $('.idEmpresaSells').val(); // CSRF hash

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


        $("#idTipoVehiculo").select2({
            ajax: {
                url: "<?= site_url('admin/vehiculos/getTipoVehiculoAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                    var idEmpresa = $('.idEmpresaVehiculos').val(); // CSRF hash

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



        // Initialize select2 storages
        $("#idVehiculoSell").select2({
            ajax: {
                url: "<?= site_url('admin/vehiculos/getVehiculossAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                    var idEmpresa = $('.idEmpresaSells').val(); // CSRF hash

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
         * Get data Custumer on change
         */

        $("#idVehiculoSell").on("change", function () {


            var idVehiculo = $(this).val();

            var datos = new FormData();
            datos.append("idVehiculos", idVehiculo);

            // TRAE ULTIMO FOLIO
            $.ajax({

                url: "<?= base_url('admin/vehiculos/getVehiculos') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {


                    console.log(respuesta);

                    $("#tipoVehiculo").val(respuesta["descripcionTipo"]);



                }

            });

        });






        $(document).on('click', '#btnSaveVehiculos', function (e) {


            var idVehiculos = $("#idVehiculos").val();
            var idEmpresa = $("#idEmpresaVehiculos").val();
            var idTipoVehiculo = $("#idTipoVehiculo").val();
            var descripcion = $("#descripcion").val();
            var placas = $("#placas").val();

            var permisoSCT = $("#permisoSCT").val();
            var numPermisoSCT = $("#numPermisoSCT").val();
            var configVehicular = $("#configVehicular").val();
            var pesoBrutoVehicular = $("#pesoBrutoVehicular").val();
            var anioModelo = $("#anioModelo").val();
            var aseguraRespCivil = $("#aseguraRespCivil").val();
            var polizaRespCivil = $("#polizaRespCivil").val();



            if (idEmpresa == 0 || idEmpresa == null) {

                Toast.fire({
                    icon: 'error',
                    title: "Tiene que seleccionar la empresa"
                });
                return;
            }

            if (idTipoVehiculo == 0 || idTipoVehiculo == null) {

                Toast.fire({
                    icon: 'error',
                    title: "Tiene que seleccionar el tipo de vehiculo"
                });
                return;
            }



            $("#btnSaveVehiculos").attr("disabled", true);

            var datos = new FormData();
            datos.append("idVehiculos", idVehiculos);
            datos.append("idEmpresa", idEmpresa);
            datos.append("idTipoVehiculo", idTipoVehiculo);
            datos.append("descripcion", descripcion);
            datos.append("placas", placas);

            datos.append("permSCT", permisoSCT);
            datos.append("numPermisoSCT", numPermisoSCT);
            datos.append("configVehicular", configVehicular);
            datos.append("pesoBrutoVehicular", pesoBrutoVehicular);
            datos.append("anioModelo", anioModelo);
            datos.append("aseguraRespCivil", aseguraRespCivil);
            datos.append("polizaRespCivil", polizaRespCivil);


            $.ajax({

                url: "<?= base_url('admin/vehiculos/save') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    if (respuesta.match(/Correctamente.*/)) {

                        Toast.fire({
                            icon: 'success',
                            title: "Guardado Correctamente"
                        });

                        tableVehiculos.ajax.reload();
                        $("#btnSaveVehiculos").removeAttr("disabled");


                        $('#modalAddVehiculos').modal('hide');
                    } else {

                        Toast.fire({
                            icon: 'error',
                            title: respuesta
                        });



                    }

                }

            }

            ).fail(function (jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 0) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "No hay conexión.!" + jqXHR.responseText
                    });




                } else if (jqXHR.status == 404) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Requested page not found [404]" + jqXHR.responseText
                    });



                } else if (jqXHR.status == 500) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Internal Server Error [500]." + jqXHR.responseText
                    });



                } else if (textStatus === 'parsererror') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Requested JSON parse failed." + jqXHR.responseText
                    });



                } else if (textStatus === 'timeout') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Time out error." + jqXHR.responseText
                    });



                } else if (textStatus === 'abort') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ajax request aborted." + jqXHR.responseText
                    });


                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: 'Uncaught Error: ' + jqXHR.responseText
                    });



                }
            })

        });




        $(".btnSavePayment").on("click", function () {

            var titulo = $("#titulo").val();
            listProducts();
            if (titulo == "Editar Cotizacion") {

                saveCartaPorte();

            } else {


                $("#modalPayment").modal("toggle");
                saveCartaPorte();

            }

        });




        /**
         * Save Quote
         */

        $(".btnSaveCartaPorte").on("click", function () {

            listProducts();
            listMercancias();
            var titulo = $("#titulo").val();

            if (titulo == "Editar Cotizacion") {

                saveCartaPorte();

            } else {

                $("#modalPayment").modal("toggle");

            }


        });


        function timbrarVenta() {


            var UUID = $("#uuid").val();


            $(".btnTimbrar").attr("disabled", true);



            $.ajax({

                url: "<?= base_url('admin/facturarCartaPorte/') ?>" + UUID,
                method: "GET",
                cache: false,
                contentType: false,
                processData: false,
                //dataType:"json",
                success: function (respuesta) {


                    if (respuesta.match(/success.*/)) {


                        Toast.fire({
                            icon: 'success',
                            title: "Timbrada Correctamente"
                        });

                        $(".btnTimbrar").removeAttr("disabled");


                        window.open("<?= base_url('admin/xml/generarCartaPortePDFDesdeVenta') ?>" + "/" + UUID, "_blank");
                        return true;

                    } else {

                        Toast.fire({
                            icon: 'error',
                            title: respuesta
                        });

                        $(".btnTimbrar").removeAttr("disabled");

                        return false;


                    }

                }

            }

            )

            return true;
        }


        function saveCartaPorte() {


            var UUID = $("#uuid").val();
            var folio = $("#folio").val();
            var idQuote = $("#idQuote").val();
            var idEmpresa = $("#idEmpresaSells").val();
            var idSucursal = $("#idSucursal").val();
            var custumerSell = $("#custumerSell").val();

            var TranspInternac = $("#TranspInternac").val();
            var TotalDistRec = $("#TotalDistRec").val();

            //UBICACIONES ORIGEN
            var ubicacionOrigen = $("#ubicacionOrigen").val();
            var nombreRazonSocialUbicacionOrigen = $("#nombreRazonSocialOrigen").val();
            var FechaHoraSalidaLlegadaOrigen = $("#fechaHoraSalidaLlegadaOrigen").val();
            var DistanciaRecorridaOrigen = $("#distanciaRecorridaOrigen").val();
            var RFCRemitenteDestinatarioOrigen = $("#RFCRemitenteDestinatarioOrigen").val();
            var codigoPostalOrigen = $("#codigoPostalOrigen").val();
            var paisOrigen = $("#paisOrigen").val();
            var estadoOrigen = $("#estadoOrigen").val();
            var municipioOrigen = $("#municipioOrigen").val();
            var localidadOrigen = $("#localidadOrigen").val();
            var coloniaOrigen = $("#coloniaOrigen").val();
            var calleOrigen = $("#calleOrigen").val();
            var numInteriorOrigen = $("#numInteriorOrigen").val();
            var numExteriorOrigen = $("#numExteriorOrigen").val();
            var referenciaOrigen = $("#referenciaOrigen").val();

            var date = $("#date").val();
            var dateVen = $("#dateVen").val()
            var idUser = $("#idUser").val();
            var generalObservations = $("#obsevations").val();
            var listProducts = $("#listProducts").val();
            var quoteTo = $("#quoteTo").val();
            var delivaryTime = $("#delivaryTime").val();
            var calleOrigen = $("#calleOrigen").val();
            var numInteriorOrigen = $("#numInteriorOrigen").val();
            var referenciaOrigen = $("#referenciaOrigen").val();

            //UBICACIONES DESTINO
            var ubicacionDestino = $("#ubicacionDestino").val();

            var nombreRazonSocialUbicacionDestino = $("#nombreRazonSocialDestino").val();
            var RFCRemitenteDestinatarioDestino = $("#RFCRemitenteDestinatarioDestino").val();

            var FechaHoraSalidaLlegadaDestino = $("#fechaHoraSalidaLlegadaDestino").val();
            var DistanciaRecorridaDestino = $("#distanciaRecorridaDestino").val();
            var codigoPostalDestino = $("#codigoPostalDestino").val();
            var paisDestino = $("#paisDestino").val();
            var estadoDestino = $("#estadoDestino").val();
            var municipioDestino = $("#municipioDestino").val();
            var localidadDestino = $("#localidadDestino").val();
            var coloniaDestino = $("#coloniaDestino").val();
            var calleDestino = $("#calleDestino").val();
            var numInteriorDestino = $("#numInteriorDestino").val();
            var numExteriorDestino = $("#numExteriorDestino").val();
            var referenciaDestino = $("#referenciaDestino").val();

            //DATOS EXTRAS VEHICULOS
            var idVehiculoSell = $("#idVehiculoSell").val();
            var permisoSCTCartaPorte = $("#permisoSCTCartaPorte").val();
            var numPermisoSCTCartaPorte = $("#numPermisoSCTCartaPorte").val();
            var configVehicularCartaPorte = $("#configVehicularCartaPorte").val();
            var pesoBrutoVehicularCartaPorte = $("#pesoBrutoVehicularCartaPorte").val();
            var anioModeloCartaPorte = $("#anioModeloCartaPorte").val();
            var aseguraRespCivilCartaPorte = $("#aseguraRespCivilCartaPorte").val();
            var polizaRespCivilCartaPorte = $("#polizaRespCivilCartaPorte").val();
            var placaVehiculoCartaPorte = $("#placaVehiculoCartaPorte").val();

            //DATOS CHOFER
            var idChoferSell = $("#idChoferSell").val();
            var nombreCartaPorte = $("#nombreCartaPorte").val();
            var ApellidoCartaPorte = $("#ApellidoCartaPorte").val();
            var tipoFiguraCartaPorte = $("#tipoFiguraCartaPorte").val();
            var RFCFiguraCartaPorte = $("#RFCFiguraCartaPorte").val();
            var numLicenciaCartaPorte = $("#numLicenciaCartaPorte").val();
            var RemolqueCartaPorte = $("#subTipoRemolqueCartaPorte").val();

            var codigoPostalChoferCartaPorte = $("#codigoPostalChoferCartaPorte").val();
            var paisChoferCartaPorte = $("#paisChoferCartaPorte").val();
            var estadoChoferCartaPorte = $("#estadoChoferCartaPorte").val();
            var municipioChoferCartaPorte = $("#municipioChoferCartaPorte").val();

            //DATOS REMOLQUE
            var idRemolqueCartaPorte = $("#idRemolqueCartaPorte").val();
            var descripcionRemolqueCartaPorte = $("#descripcionRemolqueCartaPorte").val();
            var subTipoRemolqueCartaPorte = $("#subTipoRemolqueCartaPorte").val();
            var placaRemolqueCartaPorte = $("#placaRemolqueCartaPorte").val();


            var subTotal = $("#subTotal").val();
            var taxes = $("#totalImpuesto").val();
            var IVARetenido = $("#totalRetencionIVA").val();
            var ISRRetenido = $("#totalRetencionISR").val();
            var total = $("#granTotal").val();

            var datePayment = $("#datePayment").val();
            var metodoPago = $("#metodoPago").val();
            var pago = $("#pago").val();
            var cambio = $("#cambio").val();

            var tipoComprobanteRD = $("#tipoComprobanteRD").val();
            var folioComprobanteRD = $("#folioComprobanteRD").val();

            var RFCReceptor = $("#RFCReceptor").val();
            var usoCFDIVenta = $("#usoCFDIVenta").val();
            var metodoPagoVenta = $("#metodoPagoVenta").val();
            var formaPagoVenta = $("#formaPagoVenta").val();
            var razonSocialReceptor = $("#razonSocialReceptor").val();
            var codigoPostalReceptor = $("#codigoPostalReceptor").val();
            var regimenFiscalReceptor = $("#regimenFiscalReceptor").val();


            var listMercancias = $("#listMercancias").val();


            var idVehiculo = $("#idVehiculoSell").val();
            var idChofer = $("#idChoferSell").val();
            var tipoVehiculo = $("#tipoVehiculo").val();




            var ajaxGuardarConsulta = "ajaxGuardarConsulta";


            /**
             * Validaciones
             * 
             */
            if (idEmpresa == 0 || idEmpresa == "") {

                Toast.fire({
                    icon: 'error',
                    title: "Tiene que seleccionar la empresa"
                });

                return false;

            }

            /*
             if (custumerSell == 0 || custumerSell == "") {
             
             Toast.fire({
             icon: 'error',
             title: "Tiene que seleccionar un cliente"
             });
             
             return false;
             
             }
             */

            if (idSucursal == 0 || idSucursal == "") {

                Toast.fire({
                    icon: 'error',
                    title: "Tiene que seleccionar una sucursal"
                });

                return false;

            }


            if (listProducts == "[]") {

                Toast.fire({
                    icon: 'error',
                    title: "Tiene que agregar al menos un producto"
                });

                return false;

            }



            $(".btnSaveCartaPorte").attr("disabled", true);


            var datos = new FormData();
            datos.append("idCustumer", custumerSell);
            datos.append("idEmpresa", idEmpresa);
            datos.append("idQuote", idQuote);
            datos.append("folio", folio);

            datos.append("TranspInternac", TranspInternac);
            datos.append("TotalDistRec", TotalDistRec);



            //UBICACIONES DESTINO
            datos.append("IDUbicacionOrigen", ubicacionOrigen);
            datos.append("nombreRazonSocialUbicacionOrigen", nombreRazonSocialUbicacionOrigen);
            datos.append("RFCRemitenteDestinatarioOrigen", RFCRemitenteDestinatarioOrigen);
            datos.append("FechaHoraSalidaLlegadaOrigen", FechaHoraSalidaLlegadaOrigen);
            datos.append("DistanciaRecorridaOrigen", DistanciaRecorridaOrigen);
            datos.append("LocalidadOrigen", localidadOrigen);

            datos.append("ReferenciaOrigen", referenciaOrigen);
            datos.append("LocalidadOrigen", localidadOrigen);
            datos.append("MunicipioOrigen", municipioOrigen);
            datos.append("EstadoOrigen", estadoOrigen);
            datos.append("PaisOrigen", paisOrigen);

            datos.append("CodigoPostalOrigen", codigoPostalOrigen);
            datos.append("ColoniaOrigen", coloniaOrigen);
            datos.append("CalleOrigen", calleOrigen);
            datos.append("numInteriorOrigen", numInteriorOrigen);
            datos.append("numExteriorOrigen", numExteriorOrigen);
            datos.append("referenciaOrigen", referenciaOrigen);

            datos.append("IDUbicacionDestino", ubicacionDestino);

            datos.append("nombreRazonSocialUbicacionDestino", nombreRazonSocialUbicacionDestino);
            datos.append("RFCRemitenteDestinatarioDestino", RFCRemitenteDestinatarioDestino);

            datos.append("FechaHoraSalidaLlegadaDestino", FechaHoraSalidaLlegadaDestino);
            datos.append("DistanciaRecorridaDestino", DistanciaRecorridaDestino);
            datos.append("LocalidadDestino", localidadDestino);

            datos.append("ReferenciaDestino", referenciaDestino);
            datos.append("MunicipioDestino", municipioDestino);
            datos.append("EstadoDestino", estadoDestino);
            datos.append("PaisDestino", paisDestino);
            datos.append("LocalidadDestino", localidadDestino);

            datos.append("CodigoPostalDestino", codigoPostalDestino);
            datos.append("coloniaDestino", coloniaDestino);
            datos.append("calleDestino", calleDestino);
            datos.append("numInteriorDestino", numInteriorDestino);
            datos.append("numExteriorDestino", numExteriorDestino);

            datos.append("date", date);
            datos.append("idUser", idUser);
            datos.append("listProducts", listProducts);
            datos.append("generalObservations", generalObservations);
            datos.append("dateVen", dateVen);
            datos.append("quoteTo", quoteTo);
            datos.append("delivaryTime", delivaryTime);

            datos.append("subTotal", subTotal);
            datos.append("taxes", taxes);
            datos.append("IVARetenido", IVARetenido);
            datos.append("ISRRetenido", ISRRetenido);
            datos.append("total", total);

            datos.append("importPayment", pago);
            datos.append("importBack", cambio);
            datos.append("datePayment", datePayment);
            datos.append("metodoPago", metodoPago);

            datos.append("tipoComprobanteRD", tipoComprobanteRD);
            datos.append("folioComprobanteRD", folioComprobanteRD);

            datos.append("RFCReceptor", RFCReceptor);
            datos.append("usoCFDI", usoCFDIVenta);
            datos.append("metodoPago", metodoPagoVenta);
            datos.append("formaPago", formaPagoVenta);
            datos.append("razonSocialReceptor", razonSocialReceptor);
            datos.append("codigoPostalReceptor", codigoPostalReceptor);
            datos.append("regimenFiscalReceptor", regimenFiscalReceptor);


            //DATOS EXTRAS VEHICULOS
            var idVehiculoSell = $("#idVehiculoSell").val();





            datos.append("PermSCT", permisoSCTCartaPorte);
            datos.append("NumPermisoSCT", numPermisoSCTCartaPorte);
            datos.append("ConfigVehicular", configVehicularCartaPorte);
            datos.append("PesoBrutoVehicular", pesoBrutoVehicularCartaPorte);
            datos.append("AnioModeloVM", anioModeloCartaPorte);
            datos.append("AseguraRespCivil", aseguraRespCivilCartaPorte);

            datos.append("PolizaRespCivil", polizaRespCivilCartaPorte);
            datos.append("PlacaVM", placaVehiculoCartaPorte);

            datos.append("idChofer", idChofer);



            datos.append("tipoVehiculo", tipoVehiculo);
            datos.append("idSucursal", idSucursal);
            datos.append("listMercancias", listMercancias);





            datos.append("TipoFigura", tipoFiguraCartaPorte);
            datos.append("RFCFigura", RFCFiguraCartaPorte);
            datos.append("NumLicencia", numLicenciaCartaPorte);
            datos.append("NombreFigura", nombreCartaPorte);
            datos.append("apellidoFigura", ApellidoCartaPorte);

            //DATOS REMOLQUE
            datos.append("remolqueCartaPorte", idRemolqueCartaPorte);
            datos.append("SubTipoRem", subTipoRemolqueCartaPorte);
            datos.append("PlacaSubTipoRemolque", placaRemolqueCartaPorte);


            datos.append("MunicipioFigura", municipioChoferCartaPorte);

            datos.append("EstadoFigura", estadoChoferCartaPorte);
            datos.append("PaisFigura", paisChoferCartaPorte);
            datos.append("CodigoPostalFigura", codigoPostalChoferCartaPorte);

            datos.append("idVehiculo", idVehiculo);


            datos.append("UUID", UUID);

            $.ajax({

                url: "<?= base_url('admin/cartaPorte/save') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                //dataType:"json",
                success: function (respuesta) {


                    if (respuesta.match(/Correctamente.*/)) {


                        Toast.fire({
                            icon: 'success',
                            title: "Guardado Correctamente"
                        });

                        $(".btnSaveCartaPorte").removeAttr("disabled");

                        return true;

                    } else {

                        Toast.fire({
                            icon: 'error',
                            title: respuesta
                        });

                        $(".btnSaveCartaPorte").removeAttr("disabled");

                        return false;


                    }

                }

            }

            )

            return true;
        }



        /**
         * Categorias por empresa
         */

        $(".estadoChoferCartaPorte").select2({
            ajax: {
                url: "<?= base_url('admin/ubicaciones/getEstadosSATAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,

                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                    var pais = $('.paisChofer').val(); // CSRF hash

                    return {
                        searchTerm: params.term, // search term
                        [csrfName]: csrfHash, // CSRF Token
                        pais: pais // search term
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
         * Municipios
         */

        $(".municipioChoferCartaPorte").select2({
            ajax: {
                url: "<?= base_url('admin/ubicaciones/getMunicipiosSATAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,

                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                    var estado = $('.estadoChofer').val(); // CSRF hash

                    return {
                        searchTerm: params.term, // search term
                        [csrfName]: csrfHash, // CSRF Token
                        estado: estado // search term
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

        $(".paisChoferCartaPorte").select2({
            ajax: {
                url: "<?= base_url('admin/ubicaciones/getPaisesSATAjax') ?>",
                type: "post",
                dataType: 'json',
                delay: 250,

                data: function (params) {
                    // CSRF Hash
                    var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                    var csrfHash = $('.txt_csrfname').val(); // CSRF hash

                    return {
                        searchTerm: params.term, // search term
                        [csrfName]: csrfHash, // CSRF Token
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

        function listProducts() {




            var listProducts = [];

            var description = $(".description");
            var codeProduct = $(".codeProduct");
            var cant = $(".cant");
            var price = $(".price");
            var total = $(".total");
            var porcentTax = $(".porcentTax");
            var tax = $(".tax");
            var IVARetenidoRenglon = $(".IVARetenido");
            var porcentIVARetenido = $(".porcentIVARetenido");
            var porcentISRRetenido = $(".porcentISRRetenido");
            var ISRRetenidoRenglon = $(".ISRRetenido");
            var neto = $(".neto");
            var unidad = $(".unidad");
            var lote = $(".lote");
            var idAlmacen = $(".idAlmacen");

            var claveProductoSATR = $(".claveProductoSATR");
            var claveUnidadSatR = $(".claveUnidadSatR");
            var tasaExcenta = $(".tasaExcenta");

            var subTotal = 0;
            var impuesto = 0;
            var netoTotal = 0;
            var IVARetenido = 0;
            var ISRRetenido = 0;
            var totalExento = 0;



            for (var i = 0; i < description.length; i++) {

                listProducts.push({
                    "idProduct": $(description[i]).attr("idProducto"),
                    "description": $(description[i]).val(),
                    "codeProduct": $(codeProduct[i]).val(),
                    "cant": $(cant[i]).val(),
                    "price": $(price[i]).val(),
                    "porcentTax": $(porcentTax[i]).val(),
                    "tax": $(tax[i]).val(),
                    "porcentIVARetenido": $(porcentIVARetenido[i]).val(),
                    "porcentISRRetenido": $(porcentISRRetenido[i]).val(),

                    "IVARetenido": $(IVARetenidoRenglon[i]).val(),
                    "ISRRetenido": $(ISRRetenidoRenglon[i]).val(),

                    "claveProductoSAT": $(claveProductoSATR[i]).val(),
                    "claveUnidadSAT": $(claveUnidadSatR[i]).val(),

                    "lote": $(lote[i]).val(),
                    "idAlmacen": $(idAlmacen[i]).val(),

                    "neto": $(neto[i]).val(),
                    "unidad": $(unidad[i]).val(),
                    "total": $(total[i]).val()
                });

                subTotal = Number(Number(subTotal) + Number($(total[i]).val())).toFixed(2);
                impuesto = Number(Number(impuesto) + Number($(tax[i]).val())).toFixed(2);
                IVARetenido = Number(Number(IVARetenido) + Number($(IVARetenidoRenglon[i]).val())).toFixed(2);
                ISRRetenido = Number(Number(ISRRetenido) + Number($(ISRRetenidoRenglon[i]).val())).toFixed(2);
                netoTotal = Number(Number(netoTotal) + Number($(neto[i]).val())).toFixed(2);

                if (tasaExcenta == "on") {

                    totalExento =  totalExento + Number($(total[i]).val()).toFixed(2);

                }



            }


            $("#subTotal").val(subTotal);
            $("#totalImpuesto").val(impuesto);
            $("#granTotal").val(netoTotal);
            $("#totalRetencionIVA").val(IVARetenido);
            $("#totalRetencionISR").val(ISRRetenido);
            
            $("#totalRetencionISR").val(ISRRetenido);

            //Asignamos el JSON en el input

            $("#listProducts").val(JSON.stringify(listProducts));

        }


        function listMercancias() {




            var listaMercancias = [];

            var Descripcion = $(".descriptionMercanciasCartaPorte");
            var idProducto = $(".idproducto");
            var BienesTransp = $(".claveProductoSATRMercanciaR");
            var ClaveUnidad = $(".claveUnidadSatMercanciaR");
            var Unidad = $(".unidadMercanciaR");
            var PesoEnKg = $(".pesoEnKgR");
            var MaterialPeligroso = $(".materialPeligrosoR");
            var IDDestino = $(".idDestinoMercanciaR");
            var IDOrigen = $(".idOrigenMercanciaR");
            var codeProductMercanciaR = $(".codeProductMercanciaR");
            var Cantidad = $(".cantR");

            for (var i = 0; i < Descripcion.length; i++) {

                listaMercancias.push({
                    "Descripcion": $(Descripcion[i]).val(),
                    "idproducto": $(Descripcion[i]).attr("idProducto"),
                    "BienesTransp": $(BienesTransp[i]).val(),
                    "ClaveUnidad": $(ClaveUnidad[i]).val(),
                    "Unidad": $(Unidad[i]).val(),
                    "PesoEnKg": $(PesoEnKg[i]).val(),
                    "MaterialPeligroso": $(MaterialPeligroso[i]).val(),
                    "IDDestino": $(IDDestino[i]).val(),
                    "IDOrigen": $(IDOrigen[i]).val(),
                    "codeProductMercanciaR": $(codeProductMercanciaR[i]).val(),
                    "Cantidad": $(Cantidad[i]).val()

                });

                //Asignamos el JSON en el input
                $("#listMercancias").val(JSON.stringify(listaMercancias));

            }
        }
        /*=============================================
         IMPRIMIR CONSULTA
         =============================================*/



        $(".btnPrint").on("click", function () {


            var saved = saveSell();
            var uuid = $("#uuid").val();


            if (saved == true) {

                var uuid = $("#uuid").val();


                window.open("<?= base_url('admin/cartaPorte/report') ?>" + "/" + uuid, "_blank");

                window.location = "<?= base_url('admin/cartaPorte') ?>";

            }

        })


        $(".btnTimbrar").on("click", function () {


            timbrarVenta();

        });



        //CARGA CONSULTAS ANTERIORES

        $(".btnAddArticle").on("click", function () {


            cargaProductos();

        });

        //CARGA CONSULTAS ANTERIORES

        $(".btnAgregarMercancia").on("click", function () {

            cargaMercancias();

        });


        document.addEventListener("keydown", function (event) {

            console.log(event.code);
            if (event.altKey && event.code === "KeyA") {

                cargaProductos();
                $("#modalAddbtnAddArticle").modal('show');
                event.preventDefault();


            }
        });






        function cargaProductos() {

            var empresa = $("#idEmpresaSells").val();

            if (empresa == "") {

                empresa = 0;
            }
            console.log("empresa:", empresa);
            tableProducts.ajax.url(`<?= base_url('admin/products/getAllProducts') ?>/` + empresa).load();

        }

        function cargaMercancias() {

            var empresa = $("#idEmpresaSells").val();

            if (empresa == "") {

                empresa = 0;
            }
            console.log("empresa:", empresa);
            tableMercancias.ajax.url(`<?= base_url('admin/products/getAllProducts') ?>/` + empresa).load();

        }



        $("#idSucursal").select2();


        $(".idVehiculoSell").on("change", function () {

            var idVehiculos = $(this).val();



            var datos = new FormData();
            datos.append("idVehiculos", idVehiculos);

            $.ajax({

                url: "<?= base_url('admin/vehiculos/getVehiculos') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    console.log(respuesta);
                    $("#idTipoVehiculoCartaPorte").val(respuesta["idTipoVehiculo"]);
                    $("#idTipoVehiculoCartaPorte").trigger("change");
                    $("#descripcionCartaPorte").val(respuesta["descripcion"]);
                    $("#placaVehiculoCartaPorte").val(respuesta["placas"]);

                    $("#permisoSCTCartaPorte").val(respuesta["permSCT"]);
                    $("#permisoSCTCartaPorte").trigger("change");
                    $("#numPermisoSCTCartaPorte").val(respuesta["numPermisoSCT"]);
                    $("#numPermisoSCTCartaPorte").trigger("change");
                    $("#configVehicularCartaPorte").val(respuesta["configVehicular"]);
                    $("#configVehicularCartaPorte").trigger("change");
                    $("#pesoBrutoVehicularCartaPorte").val(respuesta["pesoBrutoVehicular"]);
                    $("#anioModeloCartaPorte").val(respuesta["anioModelo"]);
                    $("#aseguraRespCivilCartaPorte").val(respuesta["aseguraRespCivil"]);
                    $("#polizaRespCivilCartaPorte").val(respuesta["polizaRespCivil"]);

                }

            }).fail(function (jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 0) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "No hay conexión.!" + jqXHR.responseText
                    });




                } else if (jqXHR.status == 404) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Requested page not found [404]" + jqXHR.responseText
                    });



                } else if (jqXHR.status == 500) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Internal Server Error [500]." + jqXHR.responseText
                    });



                } else if (textStatus === 'parsererror') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Requested JSON parse failed." + jqXHR.responseText
                    });



                } else if (textStatus === 'timeout') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Time out error." + jqXHR.responseText
                    });



                } else if (textStatus === 'abort') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ajax request aborted." + jqXHR.responseText
                    });


                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: 'Uncaught Error: ' + jqXHR.responseText
                    });



                }
            })
        })


        $(".idChoferSell").on("change", function () {

            var idChoferes = $(this).val();

            var datos = new FormData();
            datos.append("idChoferes", idChoferes);

            $.ajax({

                url: "<?= base_url('admin/choferes/getChoferes') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#nombreCartaPorte").val(respuesta["nombre"]);
                    $("#ApellidoCartaPorte").val(respuesta["Apellido"]);
                    $("#tipoFiguraCartaPorte").val(respuesta["tipoFigura"]);
                    $("#tipoFiguraCartaPorte").trigger("change");
                    $("#RFCFiguraCartaPorte").val(respuesta["RFCFigura"]);
                    $("#numLicenciaCartaPorte").val(respuesta["numLicencia"]);

                    $("#codigoPostalChoferCartaPorte").val(respuesta["CodigoPostalFigura"]);

                    var newOption = new Option(respuesta["PaisFigura"] + ' ' + respuesta["nombrePais"], respuesta["PaisFigura"], true, true);
                    $('#paisChoferCartaPorte').append(newOption).trigger('change');
                    $("#paisChoferCartaPorte").val(respuesta["PaisFigura"]);

                    var newOption2 = new Option(respuesta["EstadoFigura"] + ' ' + respuesta["nombreEstado"], respuesta["EstadoFigura"], true, true);
                    $('#estadoChoferCartaPorte').append(newOption2).trigger('change');
                    $("#estadoChoferCartaPorte").val(respuesta["EstadoFigura"]);

                    var newOption3 = new Option(respuesta["MunicipioFigura"] + ' ' + respuesta["nombreMunicipio"], respuesta["MunicipioFigura"], true, true);
                    $('#municipioChoferCartaPorte').append(newOption3).trigger('change');
                    $("#municipioChoferCartaPorte").val(respuesta["MunicipioFigura"]);

                }

            })

        })


        $(".idChoferSell").on("click", function () {

            var idChoferes = $(this).val();

            var datos = new FormData();
            datos.append("idChoferes", idChoferes);

            $.ajax({

                url: "<?= base_url('admin/choferes/getChoferes') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#nombreCartaPorte").val(respuesta["nombre"]);
                    $("#ApellidoCartaPorte").val(respuesta["Apellido"]);
                    $("#tipoFiguraCartaPorte").val(respuesta["tipoFigura"]);
                    $("#tipoFiguraCartaPorte").trigger("change");
                    $("#RFCFiguraCartaPorte").val(respuesta["RFCFigura"]);
                    $("#numLicenciaCartaPorte").val(respuesta["numLicencia"]);

                    $("#codigoPostalChoferCartaPorte").val(respuesta["CodigoPostalFigura"]);

                    var newOption = new Option(respuesta["PaisFigura"] + ' ' + respuesta["nombrePais"], respuesta["PaisFigura"], true, true);
                    $('#paisChoferCartaPorte').append(newOption).trigger('change');
                    $("#paisChoferCartaPorte").val(respuesta["PaisFigura"]);

                    var newOption2 = new Option(respuesta["EstadoFigura"] + ' ' + respuesta["nombreEstado"], respuesta["EstadoFigura"], true, true);
                    $('#estadoChoferCartaPorte').append(newOption2).trigger('change');
                    $("#estadoChoferCartaPorte").val(respuesta["EstadoFigura"]);

                    var newOption3 = new Option(respuesta["MunicipioFigura"] + ' ' + respuesta["nombreMunicipio"], respuesta["MunicipioFigura"], true, true);
                    $('#municipioChoferCartaPorte').append(newOption3).trigger('change');
                    $("#municipioChoferCartaPorte").val(respuesta["MunicipioFigura"]);

                }

            })

        })


        $(".idRemolqueCartaPorte").on("change", function () {

            var idRemolques = $(this).val();

            var datos = new FormData();
            datos.append("idRemolques", idRemolques);

            if (idRemolques == 0) {

                $("#descripcion").val("");
                $("#subTipoRemolque").val(0);
                $("#subTipoRemolque").trigger("change");
                $("#placa").val("");
                return;
            }

            $.ajax({

                url: "<?= base_url('admin/remolques/getRemolques') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#descripcionRemolqueCartaPorte").val(respuesta["descripcion"]);
                    $("#subTipoRemolqueCartaPorte").val(respuesta["subTipoRemolque"]);
                    $("#subTipoRemolqueCartaPorte").trigger("change")
                    $("#placaRemolqueCartaPorte").val(respuesta["placa"]);


                }

            })

        })

        $(document).on('click', '#btnSaveRemolques', function (e) {


            var idRemolques = $("#idRemolques").val();
            var idEmpresa = $("#idEmpresaRemolque").val();
            var descripcion = $("#descripcionRemolque").val();
            var subTipoRemolque = $("#subTipoRemolque").val();
            var placa = $("#placa").val();

            $("#btnSaveRemolques").attr("disabled", true);

            var datos = new FormData();
            datos.append("idRemolques", idRemolques);
            datos.append("idEmpresa", idEmpresa);
            datos.append("descripcion", descripcion);
            datos.append("subTipoRemolque", subTipoRemolque);
            datos.append("placa", placa);


            $.ajax({

                url: "<?= base_url('admin/remolques/save') ?>",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    if (respuesta.match(/Correctamente.*/)) {

                        Toast.fire({
                            icon: 'success',
                            title: "Guardado Correctamente"
                        });

                        tableRemolques.ajax.reload();
                        $("#btnSaveRemolques").removeAttr("disabled");


                        $('#modalAddRemolques').modal('hide');
                    } else {

                        Toast.fire({
                            icon: 'error',
                            title: respuesta
                        });

                        $("#btnSaveRemolques").removeAttr("disabled");


                    }

                }

            }

            )

        });

<?php
if (isset($PermSCT)) {

    echo '$("#permisoSCTCartaPorte").val("' . $PermSCT . '").trigger("change");';
}

if (isset($ConfigVehicular)) {

    echo '$("#configVehicularCartaPorte").val("' . $ConfigVehicular . '").trigger("change");';
}


if (isset($TipoFigura)) {

    echo '$("#tipoFiguraCartaPorte").val("' . $TipoFigura . '").trigger("change");';
}

if (isset($subTipoRemolque)) {

    echo '$("#subTipoRemolqueCartaPorte").val("' . $subTipoRemolque . '").trigger("change");';
}
?>

        $(".configVehicularCartaPorte").select2();
        $(".subTipoRemolqueCartaPorte").select2();
        $(".idEmpresaVehiculosCartaPorte").select2();

<?php
echo '$("#usoCFDIVenta").val("' . $usoCFDIReceptor . '"); ';
echo '$("#usoCFDIVenta").trigger("change"); ';
echo '$("#metodoPagoVenta").val("' . $metodoPagoReceptor . '"); ';
echo '$("#metodoPagoVenta").trigger("change"); ';
echo '$("#formaPagoVenta").val("' . $formaPagoReceptor . '"); ';
echo '$("#formaPagoVenta").trigger("change"); ';
echo '$("#regimenFiscalReceptor").val("' . $regimenFiscalReceptor . '"); ';
echo '$("#regimenFiscalReceptor").trigger("change"); ';
?>
    </script>


    <?= $this->endSection() ?>