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

$last5years = date('Y') - 4;
$sql = "SELECT * FROM school natural join college_trend where school_id = $school AND year > $last5years  ORDER BY year;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {	

	while($row = $result->fetch_assoc()) 
	{

		array_push($datay1, $row["enrollment_rates"]);
		array_push($datay2, $row["graduation_rates"]);
		array_push($datay3, $row["faculty"]);

	}

}

// Setup the graph
$graph = new Graph(300,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Faculty (Last 5 YRS)');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();


$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array($last5years,$last5years+1,$last5years+2,$last5years+3,$last5years+4));
$graph->xgrid->SetColor('#E3E3E3');




// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('Number of Faculty');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>