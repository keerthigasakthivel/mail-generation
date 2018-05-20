<?php
$id=$addr=$cr=$cgpa=$bname=$dept=$l=$yearr=$dob=$phono=$emailid=$exx=$gen=$fname=$n=$phono=$fid="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$bname=test_input($_POST["name"]);
$id=test_input($_POST["age"]);
$fname=test_input($_POST["ffname"]);
$dob=test_input($_POST["dobb"]);
$addr=test_input($_POST["address"]);
$dept=test_input($_POST["deptt"]);
$gen=test_input($_POST["gender"]);
$n=test_input($_POST["nation"]);
$yearr=test_input($_POST["year"]);

$phono=test_input($_POST["no"]);
$emailid=test_input($_POST["mail"]);
$cr=test_input($_POST["cobj"]);
$cgpa=test_input($_POST["cgp"]);
$fid=test_input($_POST["field"]);
$l=test_input($_POST["ll"]);
$exx=test_input($_POST["ex"]);
}

function test_input($data)
{
$name=trim($data);
return $data;
}

require("C:/xampp/htdocs/fpdf.php");
class PDF extends FPDF{
function Header()
{
$this->SetFont("Times","B",25);
$this->Cell(60);
$this->Cell(60,10,"RESUME",0,1,"C");
$this->Ln(20);
}
$pdf=new FPDF();
$pdf->Addpage();
$pdf->SetFont("Arial","B",10);
$pdf->cell(90,5,"RESUME",1,1,"C");
$pdf->Cell(90,10,"Name ",1,0);
$pdf->Cell(90,10,$bname,1,1);
$pdf->Cell(90,10,"age ",1,0);
$pdf->Cell(90,10,$id ,1,1);
$pdf->Cell(90,10,"DOB",1,0);
$pdf->Cell(90,10,$dob,1,1);
$pdf->Cell(90,10,"father's Name ",1,0);
$pdf->Cell(90,10,$fname,1,1);
$pdf->Cell(90,10,"Qualification",1,0);
$pdf->Cell(90,10,$dept,1,1);
$pdf->Cell(90,10,"Gender ",1,0);
$pdf->Cell(90,10,$gen ,1,1);
$pdf->Cell(90,10,"Nationality",1,0);
$pdf->Cell(90,10,$n ,1,1);
$pdf->Cell(90,10,"Year of experience",1,0);
$pdf->Cell(90,10,$yearr,1,1);
$pdf->Cell(90,10,"PHONE ",1,0);
$pdf->Cell(90,10,$phono,1,1);
$pdf->Cell(90,10,"Career objective",1,0);
$pdf->Cell(90,10,$cr,1,1);
$pdf->Cell(90,10,"CGPA ",1,0);
$pdf->Cell(90,10,$cgpa,1,1);
$pdf->Cell(90,10,"Field of interest",1,0);
$pdf->Cell( 90,10,$fid,1,1);
$pdf->Cell(90,10,"EMAIL ",1,0);
$pdf->Cell(90,10,$emailid,1,1);
$pdf->Cell(90,10,"Lauguage",1,0);
$pdf->Cell(90,10,$l,1,1);
$pdf->Cell(90,10,"Extra curricular",1,0);
$pdf->Cell(90,10, $exx,1,1);


$pdfout=$pdf->output();}
$filename="do.pdf";

$server="localhost";
$db="keerthi";
$password="";
$user="root";
$conn=new mysqli($server,$user,$password,$db);
if($conn->connect_error)
echo"connection error";
else
{ echo"success";}

echo $bname;
$sql="insert into biodata1(name,age,fathername,dob,address,qualification,gender,nationality,year,phonenumber,emailid,careerobj,interest,lauguage,activity) values('$bname','$id','$fname','$dob','$addr','$dept','$gen','$n','$yearr','$phono','$emailid','$cr','$fid','$l','$exx')";
if($conn->query($sql)===true)
{
echo"updated!!!!";

}
else
echo"error!444";

?>
<?php
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure="tls";
$mail->Port=25;
$mail->Username = "keerthigasakthivel1998@gmail.com";  // SMTP username
$mail->Password = "9677424588"; // SMTP password

$mail->From = "keerthigasakthivel1998@gmail.com";
$mail->FromName = "keerthi";

$mail->AddAddress("abimaha12.ma@gmail.com");                  // name is optional
$mail->AddReplyTo("info@example.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->AddAttachment($filename);         // add attachments
   
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>

 