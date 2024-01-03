<?php /*?><?php defined('BASEPATH') OR exit('No direct script access allowed');
 
// reference the Dompdf namespace
use Dompdf\Dompdf;
 
class Pdf
{
    public function __construct(){
        
        // include autoloader
        require_once dirname(__FILE__).'/dompdf/autoload.inc.php';
        
        // instantiate and use the dompdf class
        $pdf = new Dompdf();
        
        $CI =& get_instance();
        $CI->dompdf = $pdf;
        
    }
}
?><?php */?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='Potrait'){
        $dompdf = new Dompdf\Dompdf();
        $dompdf->load_html($html);
		$dompdf->set_option('isRemoteEnabled', TRUE);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }
}
?>