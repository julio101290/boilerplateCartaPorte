<p>
<h3>Ubicaciones</h3>
<div class="row">

    <!-- UBICACIONES ORIGEN -->
    <div class="col-6">

        <div class="form-group row">
            <label for="ubicacionOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.ubicacionOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control form-control ubicacion" name="ubicacionOrigen" id="ubicacionOrigen" style="width:80%;">

                        <?php
                        if ($IDUbicacionDestino == "") {

                            echo '<option value="0">Seleccione  Ubicación Origen </option>';
                        } else {

                            echo '<option value="' . $IDUbicacionDestino . '"> ' . $nombreUbicacionOrigen . ' </option>';
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('ubicaciones.fields.nombreRazonSocial') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="nombreRazonSocialOrigen" id="nombreRazonSocialOrigen" class="form-control <?= session('error.nombreRazonSocialOrigen') ? 'is-invalid' : '' ?>" value="<?= $nombreRazonSocialUbicacionOrigen ?>" placeholder="<?= lang('ubicaciones.fields.nombreRazonSocial') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('ubicaciones.fields.RFCRemitenteDestinatario') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="RFCRemitenteDestinatarioOrigen" id="RFCRemitenteDestinatarioOrigen" class="form-control <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= $RFCRemitenteDestinatarioOrigen ?>" placeholder="<?= lang('ubicaciones.fields.RFCRemitenteDestinatario') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="codigoPostalOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.codigoPostalOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="codigoPostalOrigen" id="codigoPostalOrigen" class="form-control codigoPostalOrigen <?= session('error.codigoPostalOrigen') ? 'is-invalid' : '' ?>" value="<?= $CodigoPostalOrigen ?>" placeholder="<?= lang('cartaPorte.codigoPostalOrigen') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="pais" class="col-sm-2 col-form-label"><?= lang('cartaPorte.paisOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control form-control pais" name="paisOrigen" id="paisOrigen" style="width:80%;">

                        <?php
                        if ($PaisOrigen == "") {

                            echo '<option value="0">Seleccione el pais origen</option>';
                        } else {

                            echo '<option value="' . $PaisOrigen . '">' . $nombrePaisOrigen . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="estadoOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.estadoOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <select class="form-control estado form-control estadoOrigen" name="estadoOrigen" id="estadoOrigen" style="width:80%;">

                        <?php
                        if ($EstadoOrigen == 0) {
                            echo '<option value="0">Seleccione el estado origen</option>';
                        } else {

                            echo '<option value="' . $EstadoOrigen . '">' . $nombreEstadoOrigen . ' </option>';
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="municipioOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.municipioOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control estado form-control municipioOrigen" name="municipioOrigen" id="municipioOrigen" style="width:80%;">

                        <?php
                        if ($nombreMunicipioOrigen == "") {

                            echo '<option value="0">Seleccione el municipio Origen</option>';
                        } else {

                            echo '<option value="' . $MunicipioOrigen . '">' . $nombreMunicipioOrigen . '</option>';
                        }
                        ?>


                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="localidadOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.localidadOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <select class="form-control localidadOrigen form-control" name="localidadOrigen" id="localidadOrigen" style="width:80%;">

                        <?php
                        if ($LocalidadOrigen == "") {

                            echo '<option value="0">Seleccione la localidad origen</option>';
                        } else {

                            echo '<option value="' . $LocalidadOrigen . '">' . $nombreLocalidadOrigen . '</option>';
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="coloniaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.coloniaOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <select class="form-control colonia form-control" name="coloniaOrigen" id="coloniaOrigen" style="width:80%;">

                        <?php
                        if ($ColoniaOrigen == "") {

                            echo '<option value="0">Seleccione la colonia origen</option>';
                        } else {

                            echo '<option value="' . $ColoniaOrigen . '">' . $nombreColoniaOrigen . '</option>';
                        }
                        ?>


                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="calleOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.calleOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="calleOrigen" id="calleOrigen" class="form-control <?= session('error.calleOrigen') ? 'is-invalid' : '' ?>" value="<?= $CalleOrigen ?>" placeholder="<?= lang('cartaPorte.calleOrigen') ?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="numInteriorOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.numInteriorOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="numInteriorOrigen" id="numInteriorOrigen" class="form-control <?= session('error.numInteriorOrigen') ? 'is-invalid' : '' ?>" value="<?= $numInteriorOrigen ?>" placeholder="<?= lang('cartaPorte.numInteriorOrigen') ?>" autocomplete="off">
                    <input type="hidden" name="txt_csrfname" id="txt_csrfname" class="txt_csrfname" value="" >


                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="numExteriorOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.numExteriorOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="numExteriorOrigen" id="numExteriorOrigen" class="form-control <?= session('error.numExteriorOrigen') ? 'is-invalid' : '' ?>" value="<?= $numExteriorOrigen ?>" placeholder="<?= lang('cartaPorte.numExteriorOrigen') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="referenciaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.referenciaOrigen') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="referenciaOrigen" id="referenciaOrigen" class="form-control <?= session('error.referenciaOrigen') ? 'is-invalid' : '' ?>" value="<?= $ReferenciaOrigen ?>" placeholder="<?= lang('cartaPorte.referenciaOrigen') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="DistanciaRecorridaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.distanciaRecorrida') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="distanciaRecorridaOrigen" id="distanciaRecorridaOrigen" class="form-control <?= session('error.distanciaRecorridaOrigen') ? 'is-invalid' : '' ?>" value="<?= $DistanciaRecorridaOrigen ?>" placeholder="<?= lang('cartaPorte.fields.distanciaRecorrida') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="fechaHoraSalidaLlegadaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.fechaHoraSalidaLlegada') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="datetime-local" name="fechaHoraSalidaLlegadaOrigen" id="fechaHoraSalidaLlegadaOrigen" class="form-control <?= session('error.fechaHoraSalidaLlegadaOrigen') ? 'is-invalid' : '' ?>" value="<?= $FechaHoraSalidaLlegadaOrigen ?>" placeholder="<?= lang('cartaPorte.fields.fechaHoraSalidaLlegada') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group" hidden>
            <label for="quoteTo">Cotizar a: </label>
            <input class="form-control" type="text" id='quoteTo' name='quoteTo'>

        </div>
    </div>

    <div class="col-6 ">

        <div class="form-group row">
            <label for="ubicacionDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.ubicacionDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control form-control ubicacion" name="ubicacionDestino" id="ubicacionDestino" style="width:80%;">

                        <?php
                        if ($IDUbicacionDestino == "") {

                            echo '<option value="0">Seleccione  Ubicación Destino</option>';
                        } else {

                            echo '<option value="' . $IDUbicacionDestino . '">' . $IDUbicacionDestinoDescripcion . '</option>';
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('ubicaciones.fields.nombreRazonSocial') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="nombreRazonSocialDestino" id="nombreRazonSocialDestino" class="form-control <?= session('error.nombreRazonSocialDestino') ? 'is-invalid' : '' ?>" value="<?= $nombreRazonSocialUbicacionDestino ?>" placeholder="<?= lang('ubicaciones.fields.nombreRazonSocial') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('ubicaciones.fields.RFCRemitenteDestinatario') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="RFCRemitenteDestinatarioDestino" id="RFCRemitenteDestinatarioDestino" class="form-control <?= session('error.RFCRemitenteDestinatarioDestino') ? 'is-invalid' : '' ?>" value="<?= $RFCRemitenteDestinatarioDestino ?>" placeholder="<?= lang('ubicaciones.fields.RFCRemitenteDestinatario') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="codigoPostalDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.codigoPostalDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="codigoPostalDestino" id="codigoPostalDestino" class="form-control codigoPostalDestino <?= session('error.codigoPostalDestino') ? 'is-invalid' : '' ?>" value="<?= $CodigoPostalDestino ?>" placeholder="<?= lang('cartaPorte.codigoPostalDestino') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="paisDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.paisDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control form-control pais" name="paisDestino" id="paisDestino" style="width:80%;">

                        <?php
                        if ($PaisDestino == "") {

                            echo '<option value="0">Seleccione el pais destino</option>';
                        } else {

                            echo '<option value="' . $PaisDestino . '">' . $nombrePaisDestino . '</option>';
                        }
                        ?>


                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="estadoDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.estadoDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <select class="form-control estado form-control estadoDestino" name="estadoDestino" id="estadoDestino" style="width:80%;">

                        <?php
                        if ($EstadoDestino == "") {

                            echo '<option value="0">Seleccione el estado destino</option>';
                        } else {

                            echo '<option value="' . $EstadoDestino . '">' . $nombreEstadoDestino . '</option>';
                        }
                        ?>


                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="municipioDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.municipioDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>

                    <select class="form-control estado form-control municipioDestino" name="municipioDestino" id="municipioDestino" style="width:80%;">

                        <?php
                        if ($MunicipioDestino == "") {

                            echo '<option value="0">Seleccione el municipio destino</option>';
                        } else {

                            echo '<option value="' . $MunicipioDestino . '">' . $nombreMunicipioDestino . '</option>';
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="localidadDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.localidadDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <select class="form-control localidadDestino form-control" name="localidadDestino" id="localidadDestino" style="width:80%;">

                        <?php
                        if ($LocalidadDestino == "") {

                            echo '<option value="0">Seleccione la localidad destino</option>';
                        } else {

                            echo '<option value="'.$LocalidadDestino.'">'.$nombreLocalidadDestino.'</option>';
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="coloniaDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.coloniaDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <select class="form-control colonia form-control" name="coloniaDestino" id="coloniaDestino" style="width:80%;">
                        
                        <?php
                        
                        if($coloniaDestino == ""){
                            
                            echo '<option value="0">Seleccione la colonia destino</option>';
                            
                        }else{
                            
                            echo '<option value="'.$coloniaDestino.'">'.$nombreColoniaDestino.'</option>';
                            
                        }
                        
                        ?>
                        
                        
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="calleDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.calleDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="calleDestino" id="calleDestino" class="form-control <?= session('error.calle') ? 'is-invalid' : '' ?>" value="<?= $calleDestino ?>" placeholder="<?= lang('cartaPorte.calleOrigen') ?>" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="numInteriorDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.numInteriorDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="numInteriorDestino" id="numInteriorDestino" class="form-control <?= session('error.numInteriorDestino') ? 'is-invalid' : '' ?>" value="<?= $numInteriorDestino ?>" placeholder="<?= lang('cartaPorte.numInteriorDestino') ?>" autocomplete="off">
                    <input type="hidden" name="txt_csrfname" id="txt_csrfname" class="txt_csrfname" value="" >


                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="numExteriorDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.numExteriorDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="numExteriorDestino" id="numExteriorDestino" class="form-control <?= session('error.numExteriorDestino') ? 'is-invalid' : '' ?>" value="<?= $numExteriorDestino ?>" placeholder="<?= lang('cartaPorte.numExteriorDestino') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="referenciaDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.referenciaDestino') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="referenciaDestino" id="referenciaDestino" class="form-control <?= session('error.referenciaDestino') ? 'is-invalid' : '' ?>" value="<?= $ReferenciaDestino ?>" placeholder="<?= lang('cartaPorte.referenciaDestino') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="DistanciaRecorridaDestino" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.distanciaRecorrida') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" name="distanciaRecorridaDestino" id="distanciaRecorridaDestino" class="form-control <?= session('error.distanciaRecorridaDestino') ? 'is-invalid' : '' ?>" value="<?= $DistanciaRecorridaDestino ?>" placeholder="<?= lang('cartaPorte.fields.distanciaRecorrida') ?>" autocomplete="off">
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="fechaHoraSalidaLlegadaOrigen" class="col-sm-2 col-form-label"><?= lang('cartaPorte.fields.fechaHoraSalidaLlegada') ?></label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="datetime-local" name="fechaHoraSalidaLlegadaDestino" id="fechaHoraSalidaLlegadaDestino" class="form-control <?= session('error.fechaHoraSalidaLlegadaDestino') ? 'is-invalid' : '' ?>" value="<?= $FechaHoraSalidaLlegadaDestino ?>" placeholder="<?= lang('cartaPorte.fields.fechaHoraSalidaLlegada') ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <div class="form-group" hidden>
            <label for="delivaryTime">Tiempo de entrega: </label>
            <input class="form-control" type="text" id='de3livaryTime' name='delivaryTime'>

        </div>
    </div>


</div>


<div class="row" hidden>
    <div class="col-6">
        <div class="form-group">
            <label>Observaciones</label>
            <textarea class="form-control" rows="3" placeholder="Observaciones" id="obsevations" name="obsevations" value="<?= $observations ?>"></textarea>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-6">
        <div class="form-group">




            <button class="btn btn-primary btnAddUbicacion" data-toggle="modal" data-target="#modalAddUbicaciones"><i class="fa fa-plus"></i>

                Nueva Ubicación

            </button>

        </div>
    </div>


</div>
</p>