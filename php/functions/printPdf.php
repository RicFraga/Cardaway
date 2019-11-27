<?php
          
            require_once "./../../composer/vendor/autoload.php";

            use Spipu\Html2Pdf\Html2Pdf;
            use Spipu\Html2Pdf\Exception\Html2PdfException;
            use Spipu\Html2Pdf\Exception\ExceptionFormatter;

            try{
              ob_start();
              require_once './email_template.php';
              $html = ob_get_clean();

              $html2pdf = new Html2Pdf('P', 'A4', 'es');
              
              $html2pdf->writeHTML($html);
              $html2pdf->output(postal.pdf);
            }catch(Html2PdfException $e){
              $html2pdf->clean();

              $formatter = new ExceptionFormatter($e);
              echo $formatter->getHtmlMessage();
            }

          ?>