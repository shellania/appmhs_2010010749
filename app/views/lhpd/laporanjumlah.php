<?php
$pdf = new FPDF('p', 'mm', 'A4');

$pdf->AddPage();
$pdf->SetMargins(55, 3);

// setting jenis font yang akan digunakan
$pdf->SetFont('Times', 'B', 14);
// mencetak string
$pdf->Cell(190, 7, 'LAPORAN JUMLAH LHPD PER SUBSTANSI', 0, 1, 'C');
$pdf->Ln(8);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', 'B', 12);
$pdf->SetFillColor(240, 128, 128);
$pdf->Cell(55, 10, 'NAMA SUBSTANSI', 1, 0, "C", true);
$pdf->Cell(35, 10, 'JUMLAH LHPD', 1, 0, "C", true);
$pdf->Ln();
$pdf->SetFont('Times', '', 12);

foreach ($data['jumlah_lhpd'] as $row) {
    $pdf->Cell(55, 10, $row['nama_substansi'], 1);
    $pdf->Cell(35, 10, $row['JumlahLhpd'], 1, 0, "C");
    $pdf->Ln();
}

$pdf->Output('I', 'Lihat Laporan Lhpd.pdf', true);
