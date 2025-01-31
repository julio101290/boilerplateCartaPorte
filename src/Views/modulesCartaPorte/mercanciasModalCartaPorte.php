<!-- Modal Pacientes -->
<div class="modal fade" id="modalAddbtnAddMercancia" tabindex="-1" role="dialog" aria-labelledby="modalAddbtnAddMercancia" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccione Mercancia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table-mercancias" class="table table-striped table-hover va-middle tableMercancias">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descripcion</th>
                                        <th>Lote</th>
                                        <th>Almacen</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <?= lang('boilerplate.global.close') ?>
                </button>

            </div>
        </div>
    </div>
</div>



<?= $this->section('js') ?>


<script>
    var tableMercancias = $('#table-mercancias').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [
            [1, 'asc']
        ],

        ajax: {
            url: '<?= base_url('admin/products/getAllProducts') ?>/0',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [5],
                searchable: false,
                targets: [5]

            }],
        columns: [{
                'data': 'id'
            },
            {
                'data': 'description'
            },

            {
                'data': 'lote'
            },

            {
                'data': 'almacen'
            },

            {
                'data': 'stock'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                            <button class="btn bg-blue btnAddMercancia" idAlmacen="${data.idAlmacen}" lote="${data.lote}"  data-id="${data.id}" unidad="${data.unidad}" claveProductoSAT="${data.claveProductoSAT}" unidadSAT="${data.unidadSAT}" porcentIVARetenido="${data.porcentIVARetenido}" porcentISRRetenido="${data.porcentISRRetenido}" porcentTax="${data.porcentTax}" code="${data.code}" price = "${data.salePrice}" description = "${data.description}"><i class="fas fa-plus"></i></button>
                            </div>
                            </td>`
                }
            }
        ]
    });


    /**
     * Evento al hacer click al boton btnAgregarDiagnostico
     */


    $("#table-mercancias").on("click", ".btnAddMercancia", function () {



        var idProduct = $(this).attr("data-id");
        var description = $(this).attr("description");
        var codeProduct = $(this).attr("code");
        var salePrice = $(this).attr("price");
        var porcentTax = $(this).attr("porcentTax");
        var porcentIVARetenido = $(this).attr("porcentIVARetenido");
        var porcentISRRetenido = $(this).attr("porcentISRRetenido");
        var claveUnidadSAT = $(this).attr("unidadSAT");
        var unidad = $(this).attr("unidad");
        var claveProductoSAT = $(this).attr("claveProductoSAT");
        var lote = $(this).attr("lote");
        var idAlmacen = $(this).attr("idAlmacen");

        if (porcentTax > 0) {

            var tax = ((porcentTax * 0.01)) * salePrice;



        } else {

            var tax = 0;
        }

        if (porcentIVARetenido > 0) {

            var IVARetenido = ((porcentIVARetenido * 0.01)) * salePrice;
            $(".grupoTotalRetencionIVA").removeAttr("hidden");

        } else {

            var IVARetenido = 0;

        }

        if (porcentISRRetenido > 0) {

            var ISRRetenido = ((porcentISRRetenido * 0.01)) * salePrice;
            $(".grupoTotalRetencionISR").removeAttr("hidden");

        } else {

            var ISRRetenido = 0;

        }


        var pesoEnKg = "";
        var materialPeligroso = "";
        var bienesTransp = "";
        /**
         * Agregando registros
         */
        var renglon = "<div class=\"form-group row nuevoMercancia\">";
        renglon = renglon + "<div class =\"col-1\"> <button type=\"button\" class=\"btn btn-danger quitProduct\" ><span class=\"far fa-trash-alt\"></span></button> ";
        renglon = renglon + " <button type=\"button\"  data-toggle=\"modal\" data-target=\"#modelMoreInfoRowMercancia\" class=\"btn btn-primary  btnInfoMercancias\" ><span class=\"fa fa-fw fa-pencil-alt\"></span></button> </div>";
        renglon = renglon + "<div class =\"col-1\"> <input type=\"hidden\" id=\"claveProductoSATRMercancia\" class=\"form-control claveProductoSATRMercanciaR\"  name=\"claveProductoSATRMercanciaR\" value=\"" + claveProductoSAT + "\" required=\"\">";
        renglon = renglon + "<input type=\"hidden\" id=\"claveUnidadSatMercanciaR\" class=\"form-control claveUnidadSatMercanciaR\"  name=\"claveUnidadSatMercanciaR\" value=\"" + claveUnidadSAT + "\" required=\"\">";
        renglon = renglon + "<input type=\"hidden\" id=\"unidadMercanciaR\" class=\"form-control unidadMercanciaR\"  name=\"unidadMercanciaR\" value=\"" + unidad + "\" required=\"\">";
        renglon = renglon + "<input type=\"hidden\" id=\"pesoEnKgR\" class=\"form-control pesoEnKgR\"  name=\"pesoEnKgR\" value=\"" + pesoEnKg + "\" required=\"\">";
        renglon = renglon + "<input type=\"hidden\" id=\"materialPeligrosoR\" class=\"form-control materialPeligrosoR\"  name=\"materialPeligrosoR\" value=\"" + materialPeligroso + "\" required=\"\">";
        renglon = renglon + "<input type=\"hidden\" id=\"idDestinoMercanciaR\" class=\"form-control idDestinoMercanciaR\"  name=\"idDestinoMercanciaR\" value=\"\" required=\"\">";
        renglon = renglon + "<input type=\"hidden\" id=\"idOrigenMercanciaR\" class=\"form-control idOrigenMercanciaR\"  name=\"idOrigenMercanciaR\" value=\"\" required=\"\">";
        renglon = renglon + "<input type=\"text\" id=\"codeProductMercanciaR\" class=\"form-control codeProductMercanciaR\"  name=\"codeProductMercanciaR\" value=\"" + codeProduct + "\" required=\"\"> </div>";
        renglon = renglon + "<div class =\"col-7\"> <input type=\"text\" id=\"descriptionMercanciasCartaPorte\" class=\"form-control descriptionMercanciasCartaPorte\" idProducto =\"" + idProduct + "\" name=\"descriptionMercanciasCartaPorte\" value=\"" + description + "\" required=\"\"> </div>";
        renglon = renglon + "<div class =\"col-1\"> <input type=\"number\" id=\"cantR\" class=\"form-control cantR\" name=\"cantR\" value=\"1\" required=\"\"></div>";

        $(".rowMercancias").append(renglon);

        listMercancias();

    });

    var nombreDiv = "";


    /**
     * Eliminar Renglon Diagnostico
     */

    $(".rowMercancias").on("click", ".quitProduct", function () {

        $(this).parent().parent().remove();

        listMercancias();

    });


    /**
     * Mas datos Producto
     */

    $(".rowMercancias").on("click", ".btnInfoMercancias", function () {


        nombreDiv = $(this);

        var unidadSAT = $(this).parent().parent().find(".claveUnidadSatMercanciaR").val();

//        console.log("Unidad SAT",unidadSAT);

        var claveProductoSAT = $(this).parent().parent().find(".claveProductoSATRMercanciaR").val();
        var unidad = $(this).parent().parent().find(".unidadMercanciaR").val();
        var pesoEnKG = $(this).parent().parent().find(".pesoEnKgR").val();
        var idDestinoMercancia = $(this).parent().parent().find(".idDestinoMercanciaR").val();
        var idOrigenMercancia = $(this).parent().parent().find(".idOrigenMercanciaR").val();
        var materialPeligroso = $(this).parent().parent().find(".materialPeligrosoR").val();

        var newOption = new Option(unidadSAT, unidadSAT, true, true);
        $('#unidadSATRowMercancia').append(newOption).trigger('change');
        $("#unidadSATRowMercancia").val(unidadSAT);
        $("#unidadSATRowMercancia").trigger("change");

        var newOptionClaveProducto = new Option(claveProductoSAT, claveProductoSAT, true, true);
        $('#claveProductoSATRowMercancia').append(newOptionClaveProducto).trigger('change');
        $("#claveProductoSATRowMercancia").val(claveProductoSAT);
        $("#claveProductoSATRowMercancia").trigger("change");

        $("#unidadProductoMercancia").val(unidad);

        $("#pesoEnKG").val(pesoEnKG);
        $("#materialPeligroso").val(materialPeligroso);
        
        $("#idOrigenMercancia").val(idOrigenMercancia);
        $("#idDestinoMercancia").val(idDestinoMercancia);


    });




    /**
     * Eliminar Renglon Diagnostico
     */

    $(".rowProducts").on("click", ".quitProduct", function () {

        $(this).parent().parent().remove();
        listMercancias();

    });



    /**
     * Cambia Cantidad
     */

    $(".rowProducts").on("change", ".cant", function () {


        var cant = Number($(this).val());



        precio = $(this).parent().parent().find(".price").val();

        total = Number(cant) * Number(precio);

        porcIva = Number($(this).parent().parent().find(".porcentTax").val()) * 0.01;

        porcIVARetenido = Number($(this).parent().parent().find(".porcentIVARetenido").val()) * 0.01;

        porcISRRetenido = Number($(this).parent().parent().find(".porcentISRRetenido").val()) * 0.01;

        impuesto = (porcIva) * Number(total);

        IVARetenido = (porcIVARetenido) * Number(total);

        ISRRetenido = (porcISRRetenido) * Number(total);

        neto = ((porcIva + 1) * Number(total)) - (IVARetenido + ISRRetenido);

        $(this).parent().parent().find(".total").val(total);

        $(this).parent().parent().find(".neto").val(neto);

        $(this).parent().parent().find(".tax").val(impuesto);

        $(this).parent().parent().find(".IVARetenido").val(IVARetenido);

        $(this).parent().parent().find(".ISRRetenido").val(ISRRetenido);

        listProducts();

    });


    /**
     * Cambia Cantidad
     */

    $(".rowProducts").on("change", ".price", function () {


        var precio = Number($(this).val());



        cant = $(this).parent().parent().find(".cant").val();

        total = Number(cant) * Number(precio);

        porcIva = Number($(this).parent().parent().find(".porcentTax").val()) * 0.01;

        porcIVARetenido = Number($(this).parent().parent().find(".porcentIVARetenido").val()) * 0.01;

        porcISRRetenido = Number($(this).parent().parent().find(".porcentISRRetenido").val()) * 0.01;


        IVARetenido = (porcIVARetenido) * Number(total);

        ISRRetenido = (porcISRRetenido) * Number(total);

        neto = ((porcIva + 1) * Number(total)) - (IVARetenido + ISRRetenido);

        impuesto = (porcIva) * Number(total);

        $(this).parent().parent().find(".total").val(total);

        $(this).parent().parent().find(".neto").val(neto);

        $(this).parent().parent().find(".tax").val(impuesto);

        $(this).parent().parent().find(".IVARetenido").val(IVARetenido);

        $(this).parent().parent().find(".ISRRetenido").val(ISRRetenido);

        listProducts();

    });
</script>


<?= $this->endSection() ?>