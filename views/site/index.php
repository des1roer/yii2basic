<?php

use prawee\vuejs\VueJsAsset;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
VueJsAsset::register($this);

$this->registerJsFile(
        'scripts/script.js', ['depends' => 'app\assets\AppAsset']
);

$this->registerCssFile(
        'css/style.css', ['depends' => 'app\assets\AppAsset']
);

//$this->registerJs(
//        "$('#myButton').on('click', function() { alert('Button clicked!'); });", View::POS_READY, 'my-button-handler'
//);
//$this->registerCssFile("@web/css/themes/black-and-white.css", [
//    'depends' => [\yii\bootstrap\BootstrapAsset::className()],
//    'media' => 'print',
//], 'css-print-theme');
?>
<div class="site-index">

        <script type="text/x-template" id="modal-template">
         <transition name="modal">
           <div class="modal-mask">
             <div class="modal-wrapper">
               <div class="modal-container">

                 <div class="modal-header">
                   <slot name="header">
                     Форма
                   </slot>
                 </div>

                 <div class="modal-body">
                   <slot name="body">

                   </slot>
                 </div>

                 <div class="modal-footer">
                   <slot name="footer">

                     <button class="modal-default-button" @click="$emit('close')">
                       OK
                     </button>
                   </slot>
                 </div>
               </div>
             </div>
           </div>
         </transition>
       </script>
    <div id="app">   
        <modal v-show="showModal" @close="showModal = false">
            <div slot="header">           
            </div>
            <div slot="body">
            </div>
            <div slot="footer">
                <button class="btn btn-danger" @click="showModal = false">
                    Close
                </button>
            </div>
        </modal>
        <button class="btn btn-danger" @click="showModal = true">
            Open
        </button>
    </div>     

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
