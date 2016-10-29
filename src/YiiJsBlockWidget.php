<?php

namespace allowing\yiijsblock;

use yii\base\Widget;
use yii\web\View;

class YiiJsBlockWidget extends Widget
{
    public $position;

    public function init()
    {
        parent::init();

        if ($this->position === null) {
            $this->position = View::POS_END;
        }
    }

    public function run()
    {
        $content = ob_get_clean();

        // <script></script>
        preg_match('/<script.*?>(.*?)<script>/is', $content, $match);

        $js = isset($match[1]) ? $match[1] : '';

        $this->view->registerJs($js, $this->position);
    }
}
