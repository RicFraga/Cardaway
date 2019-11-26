<?php
          
            require_once "./../../composer/vendor/autoload.php";

            use Spipu\Htmlp2Pdf\Html2Pdf;

            ob_start();
            require_once './email_template.php';
            $html = ob_get_clean();

            $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
            $html2pdf->witeHTML($html);
            $html2pdf->output(postal.pdf);

          ?>