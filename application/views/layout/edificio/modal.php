<div class="modal fade" id="imagenModalRedHumeda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="text-center">
                <img id="imagenDeRedHumeda" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="imagenModalriesgo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> -->
            <div class="text-center">
                <img id="imagenDeriesgo" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="" alt="">
            </div>
        </div>
    </div>
</div>


<div class="modal" id="exampleModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $attributes = array('id' => 'upload_form', 'name' => 'pointform');
            echo Form_open_multipart('', $attributes);
            ?>
            <div class="modal-body">
                <input type="hidden" name="id_edificio" id="id_edificioModal" value="<?php echo $id_edificio ?>">
                <p>Modal body text goes here.</p>
                <select multiple class="form-control" id="exampleFormControlSelect3" name="id_riesgo" required>
                    <?php foreach ($riesgos as $ries) { ?>
                        <option value="<?php echo $ries->id_riesgo ?>"><?php echo $ries->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="upload" id="upload" class="btn btn-info">Registrar</button>
            </div>
            </form>
        </div>
    </div>
</div>