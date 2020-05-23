<form id="delete_form">
    <input type="hidden" id="delete_extintor" name="id_extintor" value="">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="imagenModalExtintor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="text-center">
                <img id="imagenDeExtintor" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
            </div>
        </div>
    </div>
</div>



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
                            <div class="form-group row" id="nombre">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Nombre</b></label>
                                    <input type="text" id="inputNombre" name="nombre" class="form-control form-control-user" placeholder="Escriba el nombre...">
                                    <div class="invalid-feedback" id="inputNombreText">
                                    </div>
                                </div>
                                <div class="col-sm-6" id="estado">
                                    <label for="exampleFormControlTextarea1"><b>Seleccione un estado</b></label>
                                    </br>
                                    <input type="radio" id="Funcionando" name="estado" value="Funcionando">
                                    <label for="Funcionando">Funcionando</label><br>
                                    <input type="radio" id="Pendiente" name="estado" value="Pendiente" checked>
                                    <label for="Pendiente">Pendiente</label><br>
                                </div>
                            </div>
                            <div class="form-group row" id="fechas">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Fecha de carga</b></label>
                                    <input type="date" id="inputFechaCarga" name="fechacarga" class="form-control form-control-user" required>
                                    <div class="invalid-feedback" id="inputFechaCargaText">
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Fecha de vencimiento</b></label>
                                    <input type="date" id="inputFechaVenc" name="fechavenc" class="form-control form-control-user" required>
                                    <div class="invalid-feedback" id="inputFechaVencText">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="nombre_usuario">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Ubicación (Opcional)</b></label>
                                    <textarea class="form-control" name="ubicacion" id="ubicacion" rows="4"></textarea>
                                    <div class="invalid-feedback" id="inputUbicacionText">
                                    </div>
                                </div>
                                <div class="col-sm-6" id="estado">
                                    <label for="exampleFormControlTextarea1"><b>Seleccione el edificio en el cual se encuentra</b></label>
                                    </br>
                                    <select multiple class="form-control" id="exampleFormControlSelect2" name="id_edificio" required>
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
                            <div class="form-group row" id="nombre_usuario">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Comentario (Opcional)</b></label>
                                    <textarea class="form-control" name="comentario" id="comentario" rows="4"></textarea>
                                    <div class="invalid-feedback" id="inputComentarioText">
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    </br>
                                    <label for="exampleFormControlTextarea1"><b>Foto (Opcional)</b></label>
                                    <input type="file" name="image_file" id="image_file" />
                                    <div class="invalid-feedback" id="inputImagenText">
                                    </div>
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