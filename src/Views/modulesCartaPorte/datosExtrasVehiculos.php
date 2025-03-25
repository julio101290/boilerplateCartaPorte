<p>
<h3>Datos Extras Vehiculos</h3>
<div class="row">


    <div class="col-4">
        <div class="form-group">
            <label for="idVehiculo">Vehiculo </label>
            <select id='idVehiculoSell' name='idVehiculoSell' class="idVehiculoSell" style='width: 80%;'>

                <?php
                if (isset($idVehiculo)) {

                    echo "   <option value='$idVehiculo'>$idVehiculo - $vehiculoNombre</option>";
                } else {

                    echo "  <option value=''>Seleccione Vehiculo</option>";
                }
                ?>

            </select>
        </div>


        <div class="form-group row">
            <label for="permisoSCTCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.permisoSCTCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control permisoSCTCartaPorte form-controlVehiculos " name="permisoSCTCartaPorte" id="permisoSCTCartaPorte" style="width:80%;">
                        <option value="0">Seleccione tipo permiso</option>

                        <option value="TPAF01">TPAF01 - Autotransporte Federal de carga general</option>
                        <option value="TPAF02">TPAF02 - Transporte privado de carga</option>
                        <option value="TPAF03">TPAF03 - Autotransporte Federal de Carga Especializada de materiales y residuos peligrosos</option>
                        <option value="TPAF04">TPAF04 - Transporte de automóviles sin rodar en vehículo tipo góndola</option>
                        <option value="TPAF05">TPAF05 - Transporte de carga de gran peso y/o volumen de hasta 90 toneladas</option>
                        <option value="TPAF06">TPAF06 - Transporte de carga especializada de gran peso y/o volumen de más 90 toneladas</option>
                        <option value="TPAF07">TPAF07 - Transporte Privado de materiales y residuos peligrosos</option>
                        <option value="TPAF08">TPAF08 - Autotransporte internacional de carga de largo recorrido</option>
                        <option value="TPAF09">TPAF09 - Autotransporte internacional de carga especializada de materiales y residuos peligrosos de largo recorrido</option>
                        <option value="TPAF10">TPAF10 - Autotransporte Federal de Carga General cuyo ámbito de aplicación comprende la franja fronteriza con Estados Unidos</option>
                        <option value="TPAF11">TPAF11 - Autotransporte Federal de Carga Especializada cuyo ámbito de aplicación comprende la franja fronteriza con Estados Unidos</option>
                        <option value="TPAF12">TPAF12 - Servicio auxiliar de arrastre en las vías generales de comunicación</option>
                        <option value="TPAF13">TPAF13 - Servicio auxiliar de servicios de arrastre, arrastre y salvamento, y depósito de vehículos en las vías generales de comunicación</option>
                        <option value="TPAF14">TPAF14 - Servicio de paquetería y mensajería en las vías generales de comunicación</option>
                        <option value="TPAF15">TPAF15 - Transporte especial para el tránsito de grúas industriales con peso máximo de 90 toneladas</option>
                        <option value="TPAF16">TPAF16 - Servicio federal para empresas arrendadoras servicio público federal</option>
                        <option value="TPAF17">TPAF17 - Empresas trasladistas de vehículos nuevos</option>
                        <option value="TPAF18">TPAF18 - Empresas fabricantes o distribuidoras de vehículos nuevos</option>
                        <option value="TPAF19">TPAF19 - Autorización expresa para circular en los caminos y puentes de jurisdicción federal con configuraciones de tractocamión doblemente articulado</option>
                        <option value="TPAF20">TPAF20 - Autotransporte Federal de Carga Especializada de fondos y valores</option>
                        <option value="TPTM01">TPTM01 - Permiso temporal para navegación de cabotaje</option>
                        <option value="TPTA01">TPTA01 - Concesión y/o autorización para el servicio regular nacional y/o internacional para empresas mexicanas</option>
                        <option value="TPTA02">TPTA02 - Permiso para el servicio aéreo regular de empresas extranjeras</option>
                        <option value="TPTA03">TPTA03 - Permiso para el servicio nacional e internacional no regular de fletamento</option>
                        <option value="TPTA04">TPTA04 - Permiso para el servicio nacional e internacional no regular de taxi aéreo</option>
                        <option value="TPXX00">TPXX00 - Permiso no contemplado en el catálogo</option>
                    </select>

                </div>
            </div>
        </div>



        <div class="form-group row">
            <label for="numPermisoSCTCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.numPermisoSCTCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="numPermisoSCTCartaPorte" id="numPermisoSCTCartaPorte" class="form-control datosVehiculos <?= session('error.numPermisoSCTCartaPorte') ? 'is-invalid' : '' ?>" value="<?= $NumPermisoSCT ?>" placeholder="<?= lang('cartaPorte.fields.numPermisoSCTCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="configVehicularCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.configVehicularCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control configVehicularCartaPorte form-controlVehiculos " name="configVehicularCartaPorte" id="configVehicularCartaPorte" style="width:80%;">
                        <option value="0">Seleccione Configuracion Vehicular</option>
                        <option value="VL">VL - Vehículo ligero de carga</option>
                        <option value="C2">C2 - Camión Unitario</option>
                        <option value="C3">C3 - Camión Unitario</option>
                        <option value="C2R2">C2R2 - Camión-Remolque</option>
                        <option value="C3R2">C3R2 - Camión-Remolque</option>
                        <option value="C2R3">C2R3 - Camión-Remolque</option>
                        <option value="C3R3">C3R3 - Camión-Remolque</option>
                        <option value="T2S1">T2S1 - Tractocamión Articulado</option>
                        <option value="T2S2">T2S2 - Tractocamión Articulado</option>
                        <option value="T2S3">T2S3 - Tractocamión Articulado</option>
                        <option value="T3S1">T3S1 - Tractocamión Articulado</option>
                        <option value="T3S2">T3S2 - Tractocamión Articulado</option>
                        <option value="T3S3">T3S3 - Tractocamión Articulado</option>
                        <option value="T2S1R2">T2S1R2 - Tractocamión Semirremolque-Remolque</option>
                        <option value="T2S2R2">T2S2R2 - Tractocamión Semirremolque-Remolque</option>
                        <option value="T2S1R3">T2S1R3 - Tractocamión Semirremolque-Remolque</option>
                        <option value="T3S1R2">T3S1R2 - Tractocamión Semirremolque-Remolque</option>
                        <option value="T3S1R3">T3S1R3 - Tractocamión Semirremolque-Remolque</option>
                        <option value="T3S2R2">T3S2R2 - Tractocamión Semirremolque-Remolque</option>
                        <option value="T3S2R3">T3S2R3 - Tractocamión Semirremolque-Remolque</option>
                        <option value="T3S2R4">T3S2R4 - Tractocamión Semirremolque-Remolque</option>
                        <option value="T2S2S2">T2S2S2 - Tractocamión Semirremolque-Semirremolque</option>
                        <option value="OTROEVGP">OTROEVGP - Especializado de carga Voluminosa y/o Gran Peso</option>
                        <option value="OTROSG">OTROSG - Servicio de Grúas</option>
                        <option value="GPLUTA">GPLUTA - Grúa de Pluma Tipo A</option>
                        <option value="GPLUTB">GPLUTB - Grúa de Pluma Tipo B</option>
                        <option value="GPLUTC">GPLUTC - Grúa de Pluma Tipo C</option>
                        <option value="GPLUTD">GPLUTD - Grúa de Pluma Tipo D</option>
                        <option value="GPLATA">GPLATA - Grúa de Plataforma Tipo A</option>
                        <option value="GPLATB">GPLATB - Grúa de Plataforma Tipo B</option>
                        <option value="GPLATC">GPLATC - Grúa de Plataforma Tipo C</option>
                        <option value="GPLATD">GPLATD - Grúa de Plataforma Tipo D</option>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="pesoBrutoVehicularCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.pesoBrutoVehicularCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="pesoBrutoVehicularCartaPorte" id="pesoBrutoVehicularCartaPorte" class="form-control datosVehiculos <?= session('error.pesoBrutoVehicularCartaPorte') ? 'is-invalid' : '' ?>" value="<?= $PesoBrutoVehicular ?>" placeholder="<?= lang('cartaPorte.fields.pesoBrutoVehicularCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="anioModeloCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.anioModeloCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="anioModeloCartaPorte" id="anioModeloCartaPorte" class="form-control datosVehiculosCartaPorte <?= session('error.anioModeloCartaPorte') ? 'is-invalid' : '' ?> anioModeloCartaPorte" value="<?= $AnioModeloVM ?>" placeholder="<?= lang('cartaPorte.fields.anioModeloCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="aseguraRespCivilCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.aseguraRespCivilCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="aseguraRespCivilCartaPorte" id="aseguraRespCivilCartaPorte" class="form-control datosVehiculos <?= session('error.aseguraRespCivilCartaPorte') ? 'is-invalid' : '' ?>" value="<?= $AseguraRespCivil ?>" placeholder="<?= lang('cartaPorte.fields.aseguraRespCivilCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="polizaRespCivilCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.polizaRespCivilCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="polizaRespCivilCartaPorte" id="polizaRespCivilCartaPorte" class="form-control datosVehiculos <?= session('error.polizaRespCivilCartaPorte') ? 'is-invalid' : '' ?>" value="<?= $PolizaRespCivil ?>" polizaRespCivilCartaPorte" placeholder="<?= lang('cartaPorte.fields.polizaRespCivilCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="placaVehiculoCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.placaVehiculoCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="placaVehiculoCartaPorte" id="placaVehiculoCartaPorte" class="form-control datosVehiculos <?= session('error.PlacaVM') ? 'is-invalid' : '' ?>" value="<?= $PlacaVM ?>" placaVehiculoCartaPorte" placeholder="<?= lang('cartaPorte.fields.placaVehiculoCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        
        
                <div class="form-group row">
            <label for="polizaRespCivilCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.AseguraMedAmbiente') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="AseguraMedAmbiente" id="AseguraMedAmbiente" class="form-control datosVehiculos <?= session('error.AseguraMedAmbiente') ? 'is-invalid' : '' ?>" value="<?= $AseguraMedAmbiente ?>" AseguraMedAmbiente" placeholder="<?= lang('cartaPorte.fields.AseguraMedAmbiente') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="PolizaMedAmbiente" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.PolizaMedAmbiente') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="PolizaMedAmbiente" id="PolizaMedAmbiente" class="form-control datosVehiculos <?= session('error.PolizaMedAmbiente') ? 'is-invalid' : '' ?>" value="<?= $PolizaMedAmbiente ?>" PolizaMedAmbiente" placeholder="<?= lang('cartaPorte.fields.PolizaMedAmbiente') ?>" autocomplete="off">
                </div>
            </div>
        </div>


    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="idChofer">Chofer </label>
            <select id='idChoferSell' name='idChoferSell' class="idChoferSell" style='width: 80%;'>

                <?php
                if (!isset($idChofer)) {

                    echo "  <option value=''>Seleccione Vehiculo</option>";
                } else {
                    echo "   <option value='$idChofer'>$idChofer - $choferNombre</option>";
                }
                ?>

            </select>
        </div>

        <div class="form-group row">
            <label for="nombreCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.nombreCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="nombreCartaPorte" id="nombreCartaPorte" class="form-control datosChoferes <?= session('error.nombreCartaPorte') ? 'is-invalid' : '' ?>" value="<?= $NombreFigura ?>" placeholder="<?= lang('cartaPorte.fields.nombreCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="ApellidoCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.ApellidoCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="ApellidoCartaPorte" id="ApellidoCartaPorte" class="form-control datosChoferes <?= session('error.Apellido') ? 'is-invalid' : '' ?>" value="<?= $ApellidoFigura ?>" placeholder="<?= lang('cartaPorte.fields.ApellidoCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="tipoFiguraCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.tipoFiguraCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control tipoFiguraCartaPorte form-controlVehiculos" name="tipoFiguraCartaPorte" id="tipoFiguraCartaPorte" style="width:80%;">
                        <option value="0">Seleccione tipo figura</option>


                        <option value="01">01 - Operador</option>
                        <option value="02">02 - Propietario</option>
                        <option value="03">03 - Arrendador</option>
                        <option value="04">04 - Notificado</option>

                    </select>

                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="RFCFiguraCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.RFCFiguraCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="RFCFiguraCartaPorte" id="RFCFiguraCartaPorte" class="form-control datosChoferes <?= session('error.Apellido') ? 'is-invalid' : '' ?> RFCFigura" value="<?= $RFCFigura ?>" placeholder="<?= lang('cartaPorte.fields.RFCFiguraCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="numLicenciaCartaPorte" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.numLicenciaCartaPorte') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="numLicenciaCartaPorte" id="numLicenciaCartaPorte" class="form-control datosChoferes <?= session('error.numLicencia') ? 'is-invalid' : '' ?> numLicenciaCartaPorte" value="<?= $NumLicencia ?>" placeholder="<?= lang('cartaPorte.fields.numLicenciaCartaPorte') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="codigoPostalChofer" class="col-sm-2 col-form-label"><?= lang('choferes.fields.codigoPostalChofer') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="codigoPostalChoferCartaPorte" id="codigoPostalChoferCartaPorte" class="form-control datosChoferes <?= session('error.codigoPostalChofer') ? 'is-invalid' : '' ?> numLicencia" value="<?= $CodigoPostalFigura ?>" placeholder="<?= lang('choferes.fields.codigoPostalChofer') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="pais" class="col-sm-2 col-form-label"><?= lang('choferes.fields.paisChofer') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control form-control paisChoferCartaPorte" name="paisChoferCartaPorte" id="paisChoferCartaPorte" style="width:80%;">

                        <?php
                        if ($PaisFigura == "") {

                            echo '<option value="0">Seleccione el pais</option>';
                        } else {

                            echo '<option value="' . $PaisFigura . '">' . $PaisFiguraNombre . '</option>';
                        }
                        ?>



                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="estado" class="col-sm-2 col-form-label"><?= lang('choferes.fields.estadoChofer') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <select class="form-control estado form-control estadoChoferCartaPorte" name="estadoChoferCartaPorte" id="estadoChoferCartaPorte" style="width:80%;">

                        <?php
                        if ($EstadoFigura == "") {

                            echo '<option value="0">Seleccione el estado</option>';
                        } else {

                            echo '<option value="' . $EstadoFigura . '">' . $EstadoFiguraNombre . '</option>';
                        }
                        ?>



                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="municipioChofer" class="col-sm-2 col-form-label"><?= lang('choferes.fields.municipioChofer') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control estado form-control municipioChoferCartaPorte" name="municipioChoferCartaPorte" id="municipioChoferCartaPorte" style="width:80%;">

                        <?php
                        if ($MunicipioFigura == "") {

                            echo '<option value="0">Seleccione el municipio</option>';
                        } else {

                            echo '<option value="' . $MunicipioFigura . '">' . $MunicipioFiguraNombre . '</option>';
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="col-4 " >

        <div class="form-group">
            <label for="idRemolqueCartaPorte">Remolque </label>
            <select id='idRemolqueCartaPorte' name='idRemolqueCartaPorte' class="idRemolqueCartaPorte" style='width: 80%;'>

                <?php
                if (isset($remolqueCartaPorte)) {

                    echo "   <option value='$remolqueCartaPorte'>$remolqueCartaPorte - $remolqueCartaPorteNombre</option>";
                } else {

                    echo "  <option value=''>Seleccione Remolque</option>";
                }
                ?>

            </select>
        </div>



        <div class="form-group row">
            <label for="descripcionRemolqueCartaPorte" class="col-sm-2 col-form-label"><?= lang('remolques.fields.descripcion') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="descripcionRemolqueCartaPorte" id="descripcionRemolqueCartaPorte" class="form-control <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= $remolqueCartaPorteNombre ?>" placeholder="<?= lang('remolques.fields.descripcion') ?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="subTipoRemolqueCartaPorte" class="col-sm-2 col-form-label"><?= lang('remolques.fields.subTipoRemolque') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control subTipoRemolqueCartaPorte form-controlVehiculos" name="subTipoRemolqueCartaPorte" id="subTipoRemolqueCartaPorte" style="width:80%;">
                        <option value="0">Seleccione Sup Tipo Remolque</option>
                        <option value="CTR001">CTR001 - Caballete</option>
                        <option value="CTR002">CTR002 - Caja</option>
                        <option value="CTR003">CTR003 - Caja Abierta</option>
                        <option value="CTR004">CTR004 - Caja Cerrada</option>
                        <option value="CTR005">CTR005 - Caja De Recolección Con Cargador Frontal</option>
                        <option value="CTR006">CTR006 - Caja Refrigerada</option>
                        <option value="CTR007">CTR007 - Caja Seca</option>
                        <option value="CTR008">CTR008 - Caja Transferencia</option>
                        <option value="CTR009">CTR009 - Cama Baja o Cuello Ganso</option>
                        <option value="CTR010">CTR010 - Chasis Portacontenedor</option>
                        <option value="CTR011">CTR011 - Convencional De Chasis</option>
                        <option value="CTR012">CTR012 - Equipo Especial</option>
                        <option value="CTR013">CTR013 - Estacas</option>
                        <option value="CTR014">CTR014 - Góndola Madrina</option>
                        <option value="CTR015">CTR015 - Grúa Industrial</option>
                        <option value="CTR016">CTR016 - Grúa</option>
                        <option value="CTR017">CTR017 - Integral</option>
                        <option value="CTR018">CTR018 - Jaula</option>
                        <option value="CTR019">CTR019 - Media Redila</option>
                        <option value="CTR020">CTR020 - Pallet o Celdillas</option>
                        <option value="CTR021">CTR021 - Plataforma</option>
                        <option value="CTR022">CTR022 - Plataforma Con Grúa</option>
                        <option value="CTR023">CTR023 - Plataforma Encortinada</option>
                        <option value="CTR024">CTR024 - Redilas</option>
                        <option value="CTR025">CTR025 - Refrigerador</option>
                        <option value="CTR026">CTR026 - Revolvedora</option>
                        <option value="CTR027">CTR027 - Semicaja</option>
                        <option value="CTR028">CTR028 - Tanque</option>
                        <option value="CTR029">CTR029 - Tolva</option>
                        <option value="CTR031">CTR031 - Volteo</option>
                        <option value="CTR032">CTR032 - Volteo Desmontable</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="placaRemolqueCartaPorte" class="col-sm-2 col-form-label"><?= lang('remolques.fields.placa') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="placaRemolqueCartaPorte" id="placaRemolqueCartaPorte" class="form-control <?= session('error.placa') ? 'is-invalid' : '' ?>" value="<?= $PlacaSubTipoRemolque ?>" placeholder="<?= lang('remolques.fields.placa') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group" hidden>
            <label for="tipoVehiculo">Tipo Vehiculo: </label>


            <?php
            if (isset($idChofer)) {

                echo "   <input class=\"form-control\" type=\"text\" id='tipoVehiculo' value=\"$tipoVehiculo\" name='tipoVehiculo'>";
            } else {

                echo "   <input class=\"form-control\" type=\"text\" id='tipoVehiculo' name='tipoVehiculo'>";
            }
            ?>
        </div>
    </div>


</div>



<div class="row">

    <div class="col-6">
        <div class="form-group">



            <button class="btn btn-primary btnAddVehiculos" data-toggle="modal" data-target="#modalAddVehiculos"><i class="fa fa-plus"></i>

                Nuevo Vehiculo

            </button>

            <button class="btn btn-primary btnAddChoferes" data-toggle="modal" data-target="#modalAddChoferes"><i class="fa fa-plus"></i>

                Nuevo Chofer

            </button>

            <button class="btn btn-primary btnAddRemolques" data-toggle="modal" data-target="#modalAddRemolques"><i class="fa fa-plus"></i>

                Nuevo Remolque

            </button>
        </div>
    </div>


</div>


</p>