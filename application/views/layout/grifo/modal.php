<form id="delete_form">
    <input type="hidden" id="delete_id_grifo" name="id_grifo" value="">
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

<div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="text-center">
                <img id="imagenDelGrifo" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
            </div>
        </div>
    </div>
</div>








<?php
$attributes = array('id' => 'upload_form', 'name' => 'pointform');
echo Form_open_multipart('', $attributes);
?>
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

                    <div class="card-body">
                        <div>
                            <!--     This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                            </br> </br>
                            -->

                            <div class="form-group row" id="nombre_grifo">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Nombre</b></label>
                                    <input type="text" id="inputNombre" name="nombre_grifo" class="form-control form-control-user" placeholder="Escriba el nombre...">
                                    <div class="invalid-feedback" id="inputNombreText">
                                    </div>
                                </div>
                                <div class="col-sm-6" id="estado_grifo">
                                    <label for="exampleFormControlTextarea1"><b>Seleccione un estado</b></label>
                                    </br>
                                    <input type="radio" id="Funcionando" name="estado_grifo" value="Funcionando">
                                    <label for="Funcionando">Funcionando</label><br>
                                    <input type="radio" id="Pendiente" name="estado_grifo" value="Pendiente" checked>
                                    <label for="Pendiente">Pendiente</label><br>
                                </div>
                            </div>
                            <div class="form-group row" id="nombre_usuario">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Descripción (Opcional)</b></label>
                                    <textarea class="form-control" name="descripcion_grifo" id="descripcion_grifo" rows="3"></textarea>
                                    <div class="invalid-feedback" id="inputDescripcionText">
                                    </div>
                                </div>
                                <div class="col-sm-6" id="comentario_grifo">
                                    <label for="exampleFormControlTextarea1"><b>Comentario (Opcional)</b></label>
                                    <textarea class="form-control" name="comentario_grifo" id="comentario_grifo" rows="3"></textarea>
                                    <div class="invalid-feedback" id="inputComentarioText">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="nombre_grifo">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="exampleFormControlTextarea1"><b>Foto (Opcional)</b></label>
                                    <input type="file" name="image_file" id="image_file" />
                                    <div class="invalid-feedback" id="inputImagenText">
                                    </div>
                                </div>
                            </div>
                            <p><b>De clic en el mapa para elegir la ubicación del grifo. (Opcional)</b></p>

                            <div class="form-group row" id="nombre_usuario">
                                <div class="col-sm-12 mb-6 mb-sm-0">
                                    <div>
                                    </div>
                                    <div style="clear:both;height:5px;">
                                    </div>
                                    <div id="pointer_div" onclick="point_it(event)" style="background-image: url('<?php echo base_url() ?>assets/images/mapa.jpg');
               background-repeat: no-repeat; width: 678px; height: 506px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-6 mb-sm-0">
                                <div>
                                    Posición X->
                                    <input type="text" name="form_x" size="4" />
                                    Posición Y->
                                    <input type="text" name="form_y" size="4" />
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
</form>