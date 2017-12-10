<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

$datay1 = array();
$datay2 = array();
$datay3 = array();

$school = $_GET["school_id"];

$servername = "localhost";  
$username = "root";
$password = "";
$dbname = "cs165mp5";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 

$last5years = date('Y') - 5;
$sql = "SELECT * FROM school natural join elementary_trend where school_id = $school AND year > $last5years  ORDER BY year;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {	

	while($row = $result->fetch_assoc()) 
	{

		array_push($datay1, $row["enrollment_rates"]);
		array_push($datay2, $row["graduation_rates"]);
		

	}

}

// Setup the graph
$graph = new Graph(300,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Enrollment and Graduation Rates (Last 5 YRS)');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();


$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array($last5years+1,$last5years+2,$last5years+3,$last5years+4,$last5years+5));
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Enrollment_Rates');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Graduation_Rates');



$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>