<?php
include('connection/connection.php');
// Retrieve the unique code from the URL
if (isset($_GET['code'])) {
    $uniqueCode = $_GET['code'];

    // Use the unique code to retrieve data from SQL
    // Assuming you have a database connection variable $con
    $query = "SELECT * FROM packages WHERE tracking_number = '$uniqueCode'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the data from the query result
        $row = mysqli_fetch_assoc($result);

        // Extract the data from the row
        $senderName = $row['sender_name'];
        $senderAddress = $row['sender_address'];
        $senderPhone = $row['sender_phone'];
        $recipientName = $row['recipient_name'];
        $recipientAddress = $row['recipient_address'];
        $recipientPhone = $row['recipient_phone'];

        // Generate the PDF using FPDF
        require_once("libraries/fpdf/fpdf.php");
        require_once("libraries/phpqrcode/qrlib.php");

        class PDF extends FPDF {
            // Page header
            function Header() {

                $this->Image('assets/img/logo.png',150,15,40);

                $this->SetFont('Arial','B',20);
        // Title
        $this->Cell(0,0,'',0,1);
        $this->SetXY(20, 25); // change the Y position to 35
        $this->Cell(50,10,'SmartPost',0,0,'C');
    
        $this->SetFont('Arial', '', 12);
        $this->Cell(-32, 25, 'Postal Management System', 0, 1, 'C');
        // Line break
        $this->Ln(5);
            }

            // Page footer
            function Footer() {
                // Add your custom footer content here
                // ...
            }
        }

        QRcode::png($uniqueCode, "test.png");
        // Create a new PDF instance
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        // Set font and font size
        $pdf->SetFont('Arial', 'B', 12);

        // Output the data in the PDF

        $pdf->Cell(0, 10, 'Sender Name: ' . $senderName, 0, 1);
        $pdf->Cell(0, 10, 'Sender Address: ' . $senderAddress, 0, 1);
        $pdf->Cell(0, 10, 'Sender Phone: ' . $senderPhone, 0, 1);
        $pdf->Cell(0, 10, 'Recipient Name: ' . $recipientName, 0, 1);
        $pdf->Cell(0, 10, 'Recipient Address: ' . $recipientAddress, 0, 1);
        $pdf->Cell(0, 10, 'Recipient Phone: ' . $recipientPhone, 0, 1);

        $pdf->Cell(0, 10, 'Tracking Number: ' . $uniqueCode, 0, 1);

        $pdf->Cell(60, 60, $pdf->Image("test.png", $pdf->GetX(), $pdf->GetY(), 60, 60), 0, 1);
        // Output the PDF
        $pdf->Output();
    } else {
        // No data found for the given unique code
        echo 'No data found for the provided tracking number.';
    }
}
?>
