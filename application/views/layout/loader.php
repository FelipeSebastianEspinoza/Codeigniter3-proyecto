<div class="loader">
    <img class="w-50 p-3" alt="cargando...." src="<?php echo base_url() ?>assets/images/loading.gif" draggable="false">
</div>

<style media="screen">
    .loader {
        position: fixed;
        z-index: 99;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: white;
        display: flex;
        justify-content: center;
        align-content: center;
    }



    .loader.hidden {
        animation: fadeOut 1s;
        animation-fill-mode: forwards;
    }

    @keyframes fadeOut {
        100% {
            opacity: 0;
            visibility: hidden;
        }

    }
</style>
<script type="text/javascript">
    window.addEventListener("load", function() {
        const loader = document.querySelector(".loader");
        loader.className += " hidden";
    });
</script>