<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries
        $this->load->library('pdf');
    }

    public function download_pdf()
    {
        // Load any data or content you want to include in the PDF
        $data['title'] = 'Sample PDF';

        // Load the view file containing the content to be converted to PDF
        $html = $this->load->view('pdf_template', $data, true);

        // Generate the PDF
        $this->pdf->load_html($html);
        $this->pdf->render();
        $pdf_content = $this->pdf->output();

        // Set the headers for PDF download
        $this->load->helper('download');
        force_download('sample_pdf.pdf', $pdf_content);
    }
}
