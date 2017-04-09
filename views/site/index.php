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
        
            <div v-for="(data, key, i) in user">
                {{ key}} {{ data}}
              </div>
        <hr/>
         <div v-for="(data, key, i) in empty">
                {{ key}} {{ data}}
              </div>
        <hr>
        <!--<div style="clear:both">{{loger}}</div>-->
        <p v-html="loger"></p>
          <button class="btn btn-success" @click="fight()">
                    Fight
                </button>
           <button class="btn btn-success" onclick="location.reload()">
                    Reload
                </button>
    </div>     
  
       
</div>
