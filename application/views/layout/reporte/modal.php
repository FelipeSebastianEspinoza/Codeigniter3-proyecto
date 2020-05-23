<form id="delete_formreporte">
    <input type="hidden" id="delete_reporte" name="id_enfermedadreportada" value="">
    <div class="modal fade" id="deleteReporteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">¿Seguro que quiere eliminar este elemento?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <input type="submit" name="delete" id="delete" value="Eliminar" class="btn btn-info" />
                </div>
            </div>
        </div>
    </div>
</form>





<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card shadow mb-4">
                    <?php
                    $attributes = array('id' => 'upload_form', 'name' => 'pointform');
                    echo Form_open_multipart('', $attributes);
                    ?>
                    <div class="card-body">
                        <div>
                            <!--     This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                            </br> </br>
                            -->
                            <div class="form-group row" id="persona">
                                <div class="col-sm-6 mb-3 mb-sm-0"></br>
                                    <label for="exampleFormControlTextarea1"><b>Persona</b></label>
                                    <input type="text" id="inputPersona" name="persona" class="form-control form-control-user" placeholder="Escriba el nombre de la persona...">
                                    <div class="invalid-feedback" id="inputPersonaText">
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0"></br>
                                    <label for="exampleFormControlTextarea1"><b>Fecha de reporte</b></label>
                                    <input type="date" id="inputFecha" name="fecha" class="form-control form-control-user" required>
                                    <div class="invalid-feedback" id="inputFechaText">
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Fecha de termino (Opcional)</b></label>
                                    <input type="date" id="inputFechaTerm" name="fechatermino" class="form-control form-control-user">
                                    <div class="invalid-feedback" id="inputFechaTermText">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="nombre_usuario">
                                <div class="col-sm-6" id="estado">
                                    <label for="exampleFormControlTextarea1"><b>Seleccione la enfermedad en el cual se encuentra</b></label>
                                    </br>
                                    <select multiple class="form-control" id="exampleFormControlSelect2" name="id_enfermedad" required>
                                        <?php foreach ($enfermedad as $enf) { ?>
                                            <?php if ($enf->id_enfermedad == '1') { ?>
                                                <option value="<?php echo $enf->id_enfermedad ?>" selected><?php echo $enf->nombre ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $enf->id_enfermedad ?>"><?php echo $enf->nombre ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6" id="estado">
                                    <label for="exampleFormControlTextarea2"><b>Seleccione el edificio en el cual se encuentra</b></label>
                                    </br>
                                    <select multiple class="form-control" id="exampleFormControlSelect3" name="id_edificio" required>
                                        <?php foreach ($edificio as $edi) { ?>
                                            <?php if ($edi->id_edificio == '1') { ?>
                                                <option value="<?php echo $edi->id_edificio ?>" selected><?php echo $edi->nombre_edificio ?></option>
                                            <?php } else { ?>
                                                <option value="<?php echo $edi->id_edificio ?>"><?php echo $edi->nombre_edificio ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>





                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="upload" id="upload" class="btn btn-info">Registrar</button>
            </div>
        </div>
    </div>
</div>