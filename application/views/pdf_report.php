<?php

class MYPDF extends TCPDF
{
    
    public $title = null;
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    // Page header
    public function Header()
    {
        
        // university logo
        $image_file = base_url() . 'resources/book.png';
        $this->Image($image_file, 30, 4, 20, '', 'PNG', '', 'C', false, 300, '', false, false, 1, false, false, false);
        // Main Title
        $this->SetFont('times', null, 15);
        $this->Cell(0, 15, 'FACULTY OF SCIENCE', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
        
        // Document title
        $this->SetFont('times', null, 12);
        $this->Cell(0, 10, $this->title, 0, 1, 'C', 0, '', 0, false, 'M', 'M');
    }
    
    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(- 20);
        $date = date('m-d-Y ', time());
        $this->Cell(0, 10, 'Date of Issue : ' . $date, 0, false, 'C', 0, '', 0, 1, 'T', 'M');
    }
    
    /**
     * function return html table of
     * student list
     */
    public function displayRecordsTable($records)
    {
        $result_table = '<div><table >
                        <tr>
                        <td>#</td>
                        <td >Registration No.</td>
                        <td colspan="2">Name</td>
                        </tr>';
        
        $records = (array) $records;
        $i = 1;
        foreach ($records as $unit) {
            $result_table = $result_table . '<tr>' . '<td>' . $i ++ . '</td>' . '<td >' . $unit->roll_no . '</td>' . '<td colspan="2">' . $unit->name . '</td>' . '</tr>';
        }
        $result_table = $result_table . '</table></div> ';
        $this->writeHTMLCell(0, '', '', '', $result_table, 'TB', 0, 1, true, 'J', true);
    }
}

$obj_pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->setTitle($page_title);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetHeaderData(null, PDF_HEADER_LOGO_WIDTH, $page_title, null);
$obj_pdf->setHeaderFont(Array(
    PDF_FONT_NAME_MAIN,
    '',
    PDF_FONT_SIZE_MAIN
    ));
$obj_pdf->setFooterFont(Array(
    PDF_FONT_NAME_DATA,
    '',
    PDF_FONT_SIZE_DATA
    ));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('times', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();

// student information summary
$obj_pdf->SetFont('times', null, 12);
$obj_pdf->Ln(1);

$obj_pdf->SetFillColor(255, 255, 255);
$obj_pdf->SetLineWidth(0.3);
$obj_pdf->SetFont('times', null, 15);

$obj_pdf->displayRecordsTable($records);

$obj_pdf->Output($page_title . '.pdf', 'I');

?>