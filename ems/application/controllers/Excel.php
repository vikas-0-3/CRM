<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;


    class Excel extends CI_Controller 
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Excel_model');
        }

        public function export_csv($qid) {
            $inputFileName = './quot.xlsx';
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($inputFileName);
            $sheet = $spreadsheet->getActiveSheet();

            

            $quot_list = $this->db->get_where('quotation', array( 'quotation_id' => $qid ));

            foreach($quot_list->result() as $quot)
            {
                $sheet->setCellValue('C11', $quot->quotation_contact_person);
                $sheet->setCellValue('J6', $quot->quotation_id);
                $sheet->setCellValue('J7', date('y-m-d'));

                $sheet->setCellValue('A15', $quot->quotation_id);

                //table data

                $result = array_sum(explode(',',$quot->quotation_grand_total));
                $sheet->setCellValue('K23', $result);
                $sheet->setCellValue('A24', "Total (In Words) : ".$this->word_convert($result));

                $str_arr8 = preg_split ("/\,/", $quot->quotation_product);
                $s88=15;
                foreach($str_arr8 as $s8) {
                    $sheet->setCellValue('B'.$s88, $s8);
                    $s88+=1;
                }

                $str_arr7 = preg_split ("/\,/", $quot->quotation_quantity);
                $s77=15;
                foreach($str_arr7 as $s7) {
                    $sheet->setCellValue('E'.$s77, $s7);
                    $s77+=1;
                }

                $str_arr6 = preg_split ("/\,/", $quot->quotation_uom);
                $s66=15;
                foreach($str_arr6 as $s6) {
                    $sheet->setCellValue('F'.$s66, $s6);
                    $s66+=1;
                }

                $str_arr5 = preg_split ("/\,/", $quot->quotation_unit_price);
                $s55=15;
                foreach($str_arr5 as $s5) {
                    $sheet->setCellValue('G'.$s55, $s5);
                    $s55+=1;
                }

                $str_arr4 = preg_split ("/\,/", $quot->quotation_total);
                $s44=15;
                foreach($str_arr4 as $s4) {
                    $sheet->setCellValue('H'.$s44, $s4);
                    $s44+=1;
                }

                $str_arr3 = preg_split ("/\,/", $quot->quotation_gst);
                $s33=15;
                foreach($str_arr3 as $s3) {
                    $sheet->setCellValue('I'.$s33, $s3);
                    $s33+=1;
                }

                $str_arr2 = preg_split ("/\,/", $quot->quotation_gst_amount);
                $s22=15;
                foreach($str_arr2 as $s2) {
                    $sheet->setCellValue('J'.$s22, $s2);
                    $s22+=1;
                }
                $str_arr = preg_split ("/\,/", $quot->quotation_grand_total);
                $s11=15;
                foreach($str_arr as $s) {
                    $sheet->setCellValue('K'.$s11, $s);
                    
                    $s11+=1;
                }


                //checks
                if($quot->quotation_check1 != null){
                    $sheet->setCellValue('A27', "1 .  ".$quot->quotation_check1);
                }
                if($quot->quotation_check2 != null){
                    $sheet->setCellValue('A28', "2 .  ".$quot->quotation_check2);
                }
                if($quot->quotation_check3 != null){
                    $sheet->setCellValue('A29', "3 .  ".$quot->quotation_check3);
                }
                if($quot->quotation_check4 != null){
                    $sheet->setCellValue('A30', "4 .  ".$quot->quotation_check4);
                }
                if($quot->quotation_check5 != null){
                    $sheet->setCellValue('A31', "5 .  ".$quot->quotation_check5);
                }
                if($quot->quotation_check6 != null){
                    $sheet->setCellValue('A32', "6 .  ".$quot->quotation_check6);
                }
                if($quot->quotation_check7 != null){
                    $sheet->setCellValue('A33', "7 .  ".$quot->quotation_check7);
                }
            }




            $writer = new Xlsx($spreadsheet);
            $filename = $inputFileName;
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'. $filename.'.xlsx"'); 
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }


        //to create excel file by your own

        // public function export_cs($qid){ 
             
        //     // $usersData = $this->Excel_model->getUserDetails($qid);
        //     $spreadsheet = new Spreadsheet();
        //     $sheet = $spreadsheet->getActiveSheet();


        //     $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
        //     $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);

        //     $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        //     $drawing->setName('Accretive');
        //     $drawing->setDescription('Accretive');
        //     $drawing->setPath('images/accretive.png');
        //     $drawing->setCoordinates('B2');
        //     $drawing->setWidthAndHeight(650, 100);
        //     $drawing->setWorksheet($spreadsheet->getActiveSheet());

        //     //abobe code is for inserting image 
        //     $styleArray = [
        //         'borders' => [
        //             'outline' => [
        //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //                 'color' => ['argb' => '0000'],
        //             ],
        //         ],
        //     ];
        //     $styleArray2 = [
        //         'borders' => [
        //             'allBorders' => [
        //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //                 'color' => ['rgb' => '000000'],
        //             ],
        //         ],
        //     ];

        //     $sheet->setCellValue('A6', 'To');
        //     $sheet->setCellValue('A7', 'Accretive Technologies Private Limited');
        //     $sheet->setCellValue('A8', 'World Tech Tower, Phase-VIII-B,');
        //     $sheet->setCellValue('A9', 'SAS Nagar, Mohali, Punjab.');

        //     $sheet ->getStyle('A6:C9')->applyFromArray($styleArray);
        //     $sheet ->getStyle('G6:H9')->applyFromArray($styleArray);

        //     $sheet->setCellValue('A11', 'Kind Attension');
        //     $sheet->getStyle('A11')->getFont()->setBold(true);
        //     $sheet->setCellValue('A12', 'Subject');
        //     $sheet->getStyle('A12')->getFont()->setBold(true);
        //     $sheet->setCellValue('E7', 'Quotation');
        //     $sheet->getStyle('E7')->getFont()->setBold(true)->setSize(20);
        //     $sheet->getStyle('E7')->applyFromArray($styleArray);

        //     $sheet->setCellValue('G6', 'Quotaion No :');
        //     $sheet->setCellValue('G7', 'Quotation Date :');
        //     $sheet->setCellValue('H7', date('Ymd'));
        //     $sheet->setCellValue('G8', 'Currency : ');
        //     $sheet->setCellValue('H8', 'INR');
        //     $sheet->setCellValue('G9', 'Prepared By :');
        //     $sheet->setCellValue('H9', 'Account Manager');
        //     $sheet->setCellValue('B12', 'Quotation List');


        //     $sheet->setCellValue('A14', '#');
        //     $sheet->getStyle('A14')->getFont()->setBold(true);
        //     $sheet->setCellValue('B14', 'Product Code and Description');
        //     $sheet->getStyle('B14')->getFont()->setBold(true);
        //     $sheet->setCellValue('C14', 'QTY');
        //     $sheet->getStyle('C14')->getFont()->setBold(true);
        //     $sheet->setCellValue('D14', 'UoM');
        //     $sheet->getStyle('D14')->getFont()->setBold(true);
        //     $sheet->setCellValue('E14', 'Unit Price');
        //     $sheet->getStyle('E14')->getFont()->setBold(true);
        //     $sheet->setCellValue('F14', 'Total w/o Taxes');
        //     $sheet->getStyle('F14')->getFont()->setBold(true);
        //     $sheet->setCellValue('G14', 'Tax Rate');
        //     $sheet->getStyle('G14')->getFont()->setBold(true);
        //     $sheet->setCellValue('H14', 'Tax Amount');
        //     $sheet->getStyle('H14')->getFont()->setBold(true);
        //     $sheet->setCellValue('I14', 'Total with Taxes');
        //     $sheet->getStyle('I14')->getFont()->setBold(true);


        //     $sheet ->getStyle('A14:I22')->applyFromArray($styleArray2);
        //     $sheet->setCellValue('H23', 'Grand Total');

        //     $sheet->setCellValue('B24', 'Total (In Words): ');
        //     $sheet->getStyle("B24:I24")->getFont()->getColor()->setRGB('FFFFFF');

        //     $sheet->getStyle('A24:I24')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000000');


        //     $sheet->getStyle('A14:I14')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('BBDDFB');

        //     $sheet->setCellValue('A26', 'Terms and Conditions :-');
        //     $sheet->getStyle('A26')->getFont()->setBold(true);

        //     $sheet->setCellValue('A36', 'If you have any query or require any further clarifications, Please feel free to contact undersigned. Looking forward to receive your most valued orders, Assuring you of our best services and support.');
        //     $sheet->setCellValue('A38', 'Thanks & Regards ...!!! ');

        //     $sheet->setCellValue('A42', 'Manoj Thakur ');
        //     $sheet->getStyle('A42')->getFont()->setBold(true);
        //     $sheet->setCellValue('A43', 'Managing Director ');
        //     $sheet->getStyle('A43')->getFont()->setBold(true);
        //     $sheet->setCellValue('A44', 'Accretive Technologies Private Limited ');
        //     $sheet->getStyle('A44')->getFont()->setBold(true);
        //     $sheet->setCellValue('A45', 'Chandigarh | Mohali | New-Delhi | Gurugaon ');
        //     $sheet->setCellValue('A46', 'Mobile : +91-9592480111 ');
        //     $sheet->setCellValue('A47', 'email : manoj@accretivetechno.com ');
        //     $sheet->setCellValue('A48', 'web : www.accretivetechno.com ');



        //     $quot_list = $this->db->get_where('quotation', array( 'quotation_id' => $qid ));

        //     foreach($quot_list->result() as $quot)
        //     {
        //         $sheet->setCellValue('B11', $quot->quotation_contact_person);
        //         $sheet->setCellValue('A15', $quot->quotation_id);
        //         $sheet->setCellValue('H6', "Q-0".$quot->quotation_id);
        //         $sheet->setCellValue('A15', $quot->quotation_id);


        //         $str_arr8 = preg_split ("/\,/", $quot->quotation_product);
        //         $s88=15;
        //         foreach($str_arr8 as $s8) {
        //             $sheet->setCellValue('B'.$s88, $s8);
        //             $s88+=1;
        //         }

        //         $result = array_sum(explode(',',$quot->quotation_grand_total));
        //         $sheet->setCellValue('I23', $result);
        //         $sheet->setCellValue('H24', $this->word_convert($result));

        //         $str_arr7 = preg_split ("/\,/", $quot->quotation_quantity);
        //         $s77=15;
        //         foreach($str_arr7 as $s7) {
        //             $sheet->setCellValue('C'.$s77, $s7);
        //             $s77+=1;
        //         }

        //         $str_arr6 = preg_split ("/\,/", $quot->quotation_uom);
        //         $s66=15;
        //         foreach($str_arr6 as $s6) {
        //             $sheet->setCellValue('D'.$s66, $s6);
        //             $s66+=1;
        //         }

        //         $str_arr5 = preg_split ("/\,/", $quot->quotation_unit_price);
        //         $s55=15;
        //         foreach($str_arr5 as $s5) {
        //             $sheet->setCellValue('E'.$s55, $s5);
        //             $s55+=1;
        //         }

        //         $str_arr4 = preg_split ("/\,/", $quot->quotation_total);
        //         $s44=15;
        //         foreach($str_arr4 as $s4) {
        //             $sheet->setCellValue('F'.$s44, $s4);
        //             $s44+=1;
        //         }

        //         $str_arr3 = preg_split ("/\,/", $quot->quotation_gst);
        //         $s33=15;
        //         foreach($str_arr3 as $s3) {
        //             $sheet->setCellValue('G'.$s33, $s3);
        //             $s33+=1;
        //         }

        //         $str_arr2 = preg_split ("/\,/", $quot->quotation_gst_amount);
        //         $s22=15;
        //         foreach($str_arr2 as $s2) {
        //             $sheet->setCellValue('H'.$s22, $s2);
        //             $s22+=1;
        //         }
        //         $str_arr = preg_split ("/\,/", $quot->quotation_grand_total);
        //         $s11=15;
        //         foreach($str_arr as $s) {
        //             $sheet->setCellValue('I'.$s11, $s);
                    
        //             $s11+=1;
        //         }


        //         $sheet->setCellValue('A28', "1 .  ".$quot->quotation_check1);
        //         $sheet->setCellValue('A29', "2 .  "."$quot->quotation_check2");
        //         $sheet->setCellValue('A30', "3 .  ".$quot->quotation_check3);
        //         $sheet->setCellValue('A31', "4 .  ". $quot->quotation_check4);
        //         $sheet->setCellValue('A32', "5 .  ". $quot->quotation_check5);
        //         $sheet->setCellValue('A33', "6 .  ". $quot->quotation_check6);
        //         $sheet->setCellValue('A34', "7 .  ". $quot->quotation_check7);

        //         $sheet->getColumnDimension('E')->setAutoSize(true);
        //     }
            
        //     $writer = new Xlsx($spreadsheet);

        //     $filename = 'quotation_'.date('Ymd');
        //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //     header('Content-Disposition: attachment;filename="'. $filename.'.xlsx"'); 
        //     header('Cache-Control: max-age=0');

            


            
        //     $writer->save('php://output');

        // }

        function word_convert($number) {
            $no = floor($number);
            $point = round($number - $no, 2) * 100;
            $hundred = null;
            $digits_1 = strlen($no);
            $i = 0;
            $str = array();
            $words = array('0' => '', '1' => 'one', '2' => 'two',
             '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
             '7' => 'seven', '8' => 'eight', '9' => 'nine',
             '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
             '13' => 'thirteen', '14' => 'fourteen',
             '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
             '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
             '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
             '60' => 'sixty', '70' => 'seventy',
             '80' => 'eighty', '90' => 'ninety');
            $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
            while ($i < $digits_1) {
              $divider = ($i == 2) ? 10 : 100;
              $number = floor($no % $divider);
              $no = floor($no / $divider);
              $i += ($divider == 10) ? 1 : 2;
              if ($number) {
                 $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                 $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                 $str [] = ($number < 21) ? $words[$number] .
                     " " . $digits[$counter] . $plural . " " . $hundred
                     :
                     $words[floor($number / 10) * 10]
                     . " " . $words[$number % 10] . " "
                     . $digits[$counter] . $plural . " " . $hundred;
              } else $str[] = null;
           }
           $str = array_reverse($str);
           $result = implode('', $str);
           $points = ($point) ?
             "." . $words[$point / 10] . " " . 
                   $words[$point = $point % 10] : '';
           return $result . "Rupees  " . $points;
        }

        public function export_pdf($qid){ 
            // no response now

            $inputFileName = './quot.xlsx';
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($inputFileName);
            $sheet = $spreadsheet->getActiveSheet();

            

            $quot_list = $this->db->get_where('quotation', array( 'quotation_id' => $qid ));

            foreach($quot_list->result() as $quot)
            {
                $sheet->setCellValue('C11', $quot->quotation_contact_person);
                $sheet->setCellValue('J6', $quot->quotation_id);
                $sheet->setCellValue('J7', date('y-m-d'));

                $sheet->setCellValue('A15', $quot->quotation_id);

                //table data

                $result = array_sum(explode(',',$quot->quotation_grand_total));
                $sheet->setCellValue('K23', $result);
                $sheet->setCellValue('A24', "Total (In Words) : ".$this->word_convert($result));

                $str_arr8 = preg_split ("/\,/", $quot->quotation_product);
                $s88=15;
                foreach($str_arr8 as $s8) {
                    $sheet->setCellValue('B'.$s88, $s8);
                    $s88+=1;
                }

                $str_arr7 = preg_split ("/\,/", $quot->quotation_quantity);
                $s77=15;
                foreach($str_arr7 as $s7) {
                    $sheet->setCellValue('E'.$s77, $s7);
                    $s77+=1;
                }

                $str_arr6 = preg_split ("/\,/", $quot->quotation_uom);
                $s66=15;
                foreach($str_arr6 as $s6) {
                    $sheet->setCellValue('F'.$s66, $s6);
                    $s66+=1;
                }

                $str_arr5 = preg_split ("/\,/", $quot->quotation_unit_price);
                $s55=15;
                foreach($str_arr5 as $s5) {
                    $sheet->setCellValue('G'.$s55, $s5);
                    $s55+=1;
                }

                $str_arr4 = preg_split ("/\,/", $quot->quotation_total);
                $s44=15;
                foreach($str_arr4 as $s4) {
                    $sheet->setCellValue('H'.$s44, $s4);
                    $s44+=1;
                }

                $str_arr3 = preg_split ("/\,/", $quot->quotation_gst);
                $s33=15;
                foreach($str_arr3 as $s3) {
                    $sheet->setCellValue('I'.$s33, $s3);
                    $s33+=1;
                }

                $str_arr2 = preg_split ("/\,/", $quot->quotation_gst_amount);
                $s22=15;
                foreach($str_arr2 as $s2) {
                    $sheet->setCellValue('J'.$s22, $s2);
                    $s22+=1;
                }
                $str_arr = preg_split ("/\,/", $quot->quotation_grand_total);
                $s11=15;
                foreach($str_arr as $s) {
                    $sheet->setCellValue('K'.$s11, $s);
                    
                    $s11+=1;
                }

                if($quot->quotation_check1 != null){
                    $sheet->setCellValue('A27', "1 .  ".$quot->quotation_check1);
                }
                if($quot->quotation_check2 != null){
                    $sheet->setCellValue('A28', "2 .  ".$quot->quotation_check2);
                }
                if($quot->quotation_check3 != null){
                    $sheet->setCellValue('A29', "3 .  ".$quot->quotation_check3);
                }
                if($quot->quotation_check4 != null){
                    $sheet->setCellValue('A30', "4 .  ".$quot->quotation_check4);
                }
                if($quot->quotation_check5 != null){
                    $sheet->setCellValue('A31', "5 .  ".$quot->quotation_check5);
                }
                if($quot->quotation_check6 != null){
                    $sheet->setCellValue('A32', "6 .  ".$quot->quotation_check6);
                }
                if($quot->quotation_check7 != null){
                    $sheet->setCellValue('A33', "7 .  ".$quot->quotation_check7);
                }
            }


            header("Content-Disposition: attachment;filename=quot.pdf");

            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf($spreadsheet);
            $writer->save("php://output");


            

        }
        
    }
?>