<?php
/**
 * Created by PhpStorm.
 * User: eveR
 * Date: 19/01/15
 * Time: 06:07 PM
 */

class TraducirController extends BaseController{

    public function index()
    {

    }

    //Procesa Google Translate
    public function traductor($url)
    {
        //Procesamos la URL
        $contenido = file_get_contents($url);
        //Procesamos la respuesta
        preg_match_all('/\[+"(.*?)", ".*?"\]/', $contenido, $procesa);
        $descripcion = '';
        foreach($procesa[1] as $procesado)
        {
            if (!preg_match("/, \[+.*?\]/", $procesado)) $descripcion .= $procesado . " ";
        }
        return trim($descripcion);
    }

    //Traduce las descripciones a otros idiomas
    function traduce($descripcion)
    {
        //Codificamos la descripción para que Google la entienda
        $descripcion = urlencode($descripcion);
        //Traducimos de Español a inglés
        $url = "http://translate.google.es/translate_a/t?client=t&amp;text=$descripcion&amp;hl=es&amp;sl=es&amp;tl=en&amp;ie=UTF-8&amp;oe=UTF-8&amp;multires=1&amp;otf=2&amp;ssel=0&amp;tsel=3";
        $ingles = traductor($url);
        //Traducimos de Español a alemán
        $url = "http://translate.google.es/translate_a/t?client=t&amp;text=$descripcion&amp;hl=es&amp;sl=es&amp;tl=de&amp;ie=UTF-8&amp;oe=UTF-8&amp;multires=1&amp;prev=btn&amp;ssel=0&amp;tsel=4";
        $aleman = traductor($url);
        //Traducimos de Español a ruso
        $url = "http://translate.google.es/translate_a/t?client=t&amp;text=$descripcion&amp;hl=es&amp;sl=es&amp;tl=ru&amp;ie=UTF-8&amp;oe=UTF-8&amp;multires=1&amp;prev=conf&amp;psl=es&amp;ptl=de&amp;otf=2&amp;it=sel.449408%2Ctgtd.7679&amp;ssel=0&amp;tsel=4";
        $ruso = traductor($url);
        //Traducimos de Español a chino
        $url = "http://translate.google.es/translate_a/t?client=t&amp;text=$descripcion&amp;hl=es&amp;sl=es&amp;tl=zh-CN&amp;ie=UTF-8&amp;oe=UTF-8&amp;multires=1&amp;prev=conf&amp;psl=es&amp;ptl=zh-TW&amp;otf=2&amp;it=sel.5752%2Ctgtd.2438&amp;ssel=0&amp;tsel=4";
        $chino = traductor($url);
        //Guardamos el resultado
    }
}