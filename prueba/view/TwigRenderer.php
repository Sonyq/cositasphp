<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */

class TwigRenderer extends TwigView {

    public function show($view, $params = array() ) {

        echo self::getTwig()->render($view, $params);


    }

}
