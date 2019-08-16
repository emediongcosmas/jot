<?php

class respond {
    
    public static function active($page, string $target)
    {
        if($page == $target)
        {
            echo 'active';
        }
    }
    
        public static function alert($type, $title, $message) {
        ?>
            <div class="alert alert-<?php echo $type; ?> alert-custom alert-dismissible" style="text-align: center; margin-bottom: 20px;" role="alert">
            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>-->
            <?php
            if ($title != "") {
                ?>
            <h4 class="alert-title"><?php echo $title; ?></h4>
                <?php
            }

            if ($message != '') {
                ?>
            <p style="margin-bottom: 0px;"><?php echo $message; ?></p>
                <?php
            }
            ?>
            </div>
        <?php
    }

    
}